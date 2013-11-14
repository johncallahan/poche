<?php
/**
 * poche, a read it later open source system
 *
 * @category   poche
 * @author     Nicolas Lœuillet <support@inthepoche.com>
 * @copyright  2013
 * @license    http://www.wtfpl.net/ see COPYING file
 */

class Poche
{
    public $user;
    public $store;
    public $tpl;
    public $messages;
    public $pagination;

    function __construct()
    {
        $this->initTpl();
        if (!$this->checkBeforeInstall()) {
            exit;
        }
        $this->store = new Database();
        $this->init();
        $this->messages = new Messages();

        # installation
        if(!$this->store->isInstalled())
        {
            $this->install();
        }
    }

    /**
     * all checks before installation.
     * @return boolean 
     */
    private function checkBeforeInstall()
    {
        $msg = '';
        $allIsGood = TRUE;

        if (!is_writable(CACHE)) {
            Tools::logm('you don\'t have write access on cache directory');
            die('You don\'t have write access on cache directory.');
        }
        else if (file_exists('./install/update.php') && !DEBUG_POCHE) {
            $msg = '<h1>setup</h1><p><strong>It\'s your first time here?</strong> Please copy /install/poche.sqlite in db folder. Then, delete install folder.<br /><strong>If you have already installed poche</strong>, an update is needed <a href="install/update.php">by clicking here</a>.</p>';
            $allIsGood = FALSE;
        }
        else if (file_exists('./install') && !DEBUG_POCHE) {
            $msg = '<h1>setup</h1><p><strong>If you want to update your poche</strong>, you just have to delete /install folder. <br /><strong>To install your poche with sqlite</strong>, copy /install/poche.sqlite in /db and delete the folder /install. you have to delete the /install folder before using poche.</p>';
            $allIsGood = FALSE;
        }
        else if (STORAGE == 'sqlite' && !is_writable(STORAGE_SQLITE)) {
            Tools::logm('you don\'t have write access on sqlite file');
            $msg = '<h1>error</h1><p>You don\'t have write access on sqlite file.</p>';
            $allIsGood = FALSE;
        }
        
        if (!$allIsGood) {
            echo $this->tpl->render('error.twig', array(
                'msg' => $msg
            ));
        }

        return $allIsGood;
    }

    private function initTpl()
    {
        # template engine
        $loader = new Twig_Loader_Filesystem(TPL);
        if (DEBUG_POCHE) {
            $twig_params = array();
        }
        else {
            $twig_params = array('cache' => CACHE);
        }
        $this->tpl = new Twig_Environment($loader, $twig_params);
        $this->tpl->addExtension(new Twig_Extensions_Extension_I18n());
        # filter to display domain name of an url
        $filter = new Twig_SimpleFilter('getDomain', 'Tools::getDomain');
        $this->tpl->addFilter($filter);

        # filter for reading time
        $filter = new Twig_SimpleFilter('getReadingTime', 'Tools::getReadingTime');
        $this->tpl->addFilter($filter);
    }

    private function init() 
    {
        Tools::initPhp();
        Session::init();

        if (isset($_SESSION['poche_user']) && $_SESSION['poche_user'] != array()) {
            $this->user = $_SESSION['poche_user'];
        }
        else {
            # fake user, just for install & login screens
            $this->user = new User();
            $this->user->setConfig($this->getDefaultConfig());
        }

        # l10n
#        $language = $this->user->getConfigValue('language');
#        putenv('LC_ALL=' . $language);
#        setlocale(LC_ALL, $language);
#        bindtextdomain($language, LOCALE); 
#        textdomain($language); 

        # Pagination
        $this->pagination = new Paginator($this->user->getConfigValue('pager'), 'p');
    }

    private function install() 
    {
        Tools::logm('poche still not installed');
        echo $this->tpl->render('install.twig', array(
            'token' => Session::getToken()
        ));
        if (isset($_GET['install'])) {
            if (($_POST['password'] == $_POST['password_repeat']) 
                && $_POST['password'] != "" && $_POST['login'] != "") {
                # let's rock, install poche baby !
                if ($this->store->install($_POST['login'], Tools::encodeString($_POST['password'] . $_POST['login'])))
                {
                    Session::logout();
                    Tools::logm('poche is now installed');
                    Tools::redirect();
                }
            }
            else {
                Tools::logm('error during installation');
                Tools::redirect();
            }
        }
        exit();
    }

    public function getDefaultConfig()
    {
        return array(
            'pager' => PAGINATION,
            'language' => LANG,
            );
    }

    /**
     * Call action (mark as fav, archive, delete, etc.)
     */
    public function action($action, Url $url, $id = 0, $import = FALSE)
    {
        switch ($action)
        {
            case 'add':
                $content = $url->extract();

                if ($this->store->add($url->getUrl(), $content['title'], $content['body'], $this->user->getId())) {
                    Tools::logm('add link ' . $url->getUrl());
                    $sequence = '';
                    if (STORAGE == 'postgres') {
                        $sequence = 'entries_id_seq';
                    }
                    $last_id = $this->store->getLastId($sequence);
                    if (DOWNLOAD_PICTURES) {
                        $content = filtre_picture($parametres_url['body'], $url->getUrl(), $last_id);
                        Tools::logm('updating content article');
                        $this->store->updateContent($last_id, $content, $this->user->getId());
                    }
                    if (!$import) {
                        $this->messages->add('s', _('the link has been added successfully'));
                    }
                }
                else {
                    if (!$import) {
                        $this->messages->add('e', _('error during insertion : the link wasn\'t added'));
                        Tools::logm('error during insertion : the link wasn\'t added ' . $url->getUrl());
                    }
                }

                if (!$import) {
                    Tools::redirect();
                }
                break;
            case 'delete':
                $msg = 'delete link #' . $id;
                if ($this->store->deleteById($id, $this->user->getId())) {
                    if (DOWNLOAD_PICTURES) {
                        remove_directory(ABS_PATH . $id);
                    }
                    $this->messages->add('s', _('the link has been deleted successfully'));
                }
                else {
                    $this->messages->add('e', _('the link wasn\'t deleted'));
                    $msg = 'error : can\'t delete link #' . $id;
                }
                Tools::logm($msg);
                Tools::redirect('?');
                break;
            case 'toggle_fav' :
                $this->store->favoriteById($id, $this->user->getId());
                Tools::logm('mark as favorite link #' . $id);
                if (!$import) {
                    Tools::redirect();
                }
                break;
            case 'toggle_archive' :
                $this->store->archiveById($id, $this->user->getId());
                Tools::logm('archive link #' . $id);
                if (!$import) {
                    Tools::redirect();
                }
                break;
            default:
                break;
        }
    }

    function displayView($view, $id = 0)
    {
        $tpl_vars = array();

        switch ($view)
        {
            case 'config':
                $dev = $this->getPocheVersion('dev');
                $prod = $this->getPocheVersion('prod');
                $compare_dev = version_compare(POCHE_VERSION, $dev);
                $compare_prod = version_compare(POCHE_VERSION, $prod);
                $tpl_vars = array(
                    'dev' => $dev,
                    'prod' => $prod,
                    'compare_dev' => $compare_dev,
                    'compare_prod' => $compare_prod,
                );
                Tools::logm('config view');
                break;
            case 'view':
                $entry = $this->store->retrieveOneById($id, $this->user->getId());
                if ($entry != NULL) {
                    Tools::logm('view link #' . $id);
                    $content = $entry['content'];
                    if (function_exists('tidy_parse_string')) {
                        $tidy = tidy_parse_string($content, array('indent'=>true, 'show-body-only' => true), 'UTF8');
                        $tidy->cleanRepair();
                        $content = $tidy->value;
                    }
                    $tpl_vars = array(
                        'entry' => $entry,
                        'content' => $content,
                    );
                }
                else {
                    Tools::logm('error in view call : entry is null');
                }
                break;
            default: # home view
                $entries = $this->store->getEntriesByView($view, $this->user->getId());
                $this->pagination->set_total(count($entries));
                $page_links = $this->pagination->page_links('?view=' . $view . '&sort=' . $_SESSION['sort'] . '&');
                $datas = $this->store->getEntriesByView($view, $this->user->getId(), $this->pagination->get_limit());
                $tpl_vars = array(
                    'entries' => $datas,
                    'page_links' => $page_links,
                );
                Tools::logm('display ' . $view . ' view');
                break;
        }

        return $tpl_vars;
    }

    /**
     * update the password of the current user. 
     * if MODE_DEMO is TRUE, the password can't be updated. 
     * @todo add the return value
     * @todo set the new password in function header like this updatePassword($newPassword)
     * @return boolean
     */
    public function updatePassword()
    {
        if (MODE_DEMO) {
            $this->messages->add('i', _('in demo mode, you can\'t update your password'));
            Tools::logm('in demo mode, you can\'t do this');
            Tools::redirect('?view=config');
        }
        else {
            if (isset($_POST['password']) && isset($_POST['password_repeat'])) {
                if ($_POST['password'] == $_POST['password_repeat'] && $_POST['password'] != "") {
                    $this->messages->add('s', _('your password has been updated'));
                    $this->store->updatePassword($this->user->getId(), Tools::encodeString($_POST['password'] . $this->user->getUsername()));
                    Session::logout();
                    Tools::logm('password updated');
                    Tools::redirect();
                }
                else {
                    $this->messages->add('e', _('the two fields have to be filled & the password must be the same in the two fields'));
                    Tools::redirect('?view=config');
                }
            }
        }
    }

    /**
     * checks if login & password are correct and save the user in session.
     * it redirects the user to the $referer link
     * @param  string $referer the url to redirect after login
     * @todo add the return value
     * @return boolean
     */
    public function login($referer)
    {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $user = $this->store->login($_POST['login'], Tools::encodeString($_POST['password'] . $_POST['login']));
            if ($user != array()) {
                # Save login into Session
                Session::login($user['username'], $user['password'], $_POST['login'], Tools::encodeString($_POST['password'] . $_POST['login']), array('poche_user' => new User($user)));

                $this->messages->add('s', _('welcome to your poche'));
                if (!empty($_POST['longlastingsession'])) {
                    $_SESSION['longlastingsession'] = 31536000;
                    $_SESSION['expires_on'] = time() + $_SESSION['longlastingsession'];
                    session_set_cookie_params($_SESSION['longlastingsession']);
                } else {
                    session_set_cookie_params(0);
                }
                session_regenerate_id(true);
                Tools::logm('login successful');
                Tools::redirect($referer);
            }
            $this->messages->add('e', _('login failed: bad login or password'));
            Tools::logm('login failed');
            Tools::redirect();
        } else {
            $this->messages->add('e', _('login failed: you have to fill all fields'));
            Tools::logm('login failed');
            Tools::redirect();
        }
    }

    /**
     * log out the poche user. It cleans the session.
     * @todo add the return value
     * @return boolean 
     */
    public function logout()
    {
        $this->user = array();
        Session::logout();
        $this->messages->add('s', _('see you soon!'));
        Tools::logm('logout');
        Tools::redirect();
    }

    /**
     * import from Instapaper. poche needs a ./instapaper-export.html file
     * @todo add the return value
     * @param string $targetFile the file used for importing
     * @return boolean
     */
    private function importFromInstapaper($targetFile)
    {
        # TODO gestion des articles favs
        $html = new simple_html_dom();
        $html->load_file($targetFile);
        Tools::logm('starting import from instapaper');

        $read = 0;
        $errors = array();
        foreach($html->find('ol') as $ul)
        {
            foreach($ul->find('li') as $li)
            {
                $a = $li->find('a');
                $url = new Url(base64_encode($a[0]->href));
                $this->action('add', $url, 0, TRUE);
                if ($read == '1') {
                    $sequence = '';
                    if (STORAGE == 'postgres') {
                        $sequence = 'entries_id_seq';
                    }
                    $last_id = $this->store->getLastId($sequence);
                    $this->action('toggle_archive', $url, $last_id, TRUE);
                }
            }

            # the second <ol> is for read links
            $read = 1;
        }
        $this->messages->add('s', _('import from instapaper completed'));
        Tools::logm('import from instapaper completed');
        Tools::redirect();
    }

    /**
     * import from Pocket. poche needs a ./ril_export.html file
     * @todo add the return value
     * @param string $targetFile the file used for importing
     * @return boolean 
     */
    private function importFromPocket($targetFile)
    {
        # TODO gestion des articles favs
        $html = new simple_html_dom();
        $html->load_file($targetFile);
        Tools::logm('starting import from pocket');

        $read = 0;
        $errors = array();
        foreach($html->find('ul') as $ul)
        {
            foreach($ul->find('li') as $li)
            {
                $a = $li->find('a');
                $url = new Url(base64_encode($a[0]->href));
                $this->action('add', $url, 0, TRUE);
                if ($read == '1') {
                        $sequence = '';
                        if (STORAGE == 'postgres') {
                            $sequence = 'entries_id_seq';
                        }
                    $last_id = $this->store->getLastId($sequence);
                    $this->action('toggle_archive', $url, $last_id, TRUE);
                }
            }
            
            # the second <ul> is for read links
            $read = 1;
        }
        $this->messages->add('s', _('import from pocket completed'));
        Tools::logm('import from pocket completed');
        Tools::redirect();
    }

    /**
     * import from Readability. poche needs a ./readability file
     * @todo add the return value
     * @param string $targetFile the file used for importing
     * @return boolean 
     */
    private function importFromReadability($targetFile)
    {
        # TODO gestion des articles lus / favs
        $str_data = file_get_contents($targetFile);
        $data = json_decode($str_data,true);
        Tools::logm('starting import from Readability');
        $count = 0;
        foreach ($data as $key => $value) {
            $url = NULL;
            $favorite = FALSE;
            $archive = FALSE;
            foreach ($value as $attr => $attr_value) {
                if ($attr == 'article__url') {
                    $url = new Url(base64_encode($attr_value));
                }
                $sequence = '';
                if (STORAGE == 'postgres') {
                    $sequence = 'entries_id_seq';
                }
                if ($attr_value == 'true') {
                    if ($attr == 'favorite') {
                        $favorite = TRUE;
                    }
                    if ($attr == 'archive') {
                        $archive = TRUE;
                    }
                }
            }
            # we can add the url
            if (!is_null($url) && $url->isCorrect()) {
                $this->action('add', $url, 0, TRUE);
                $count++;
                if ($favorite) {
                    $last_id = $this->store->getLastId($sequence);
                    $this->action('toggle_fav', $url, $last_id, TRUE);
                }
                if ($archive) {
                    $last_id = $this->store->getLastId($sequence);
                    $this->action('toggle_archive', $url, $last_id, TRUE);
                }
            }
        }
        $this->messages->add('s', _('import from Readability completed. ' . $count . ' new links.'));
        Tools::logm('import from Readability completed');
        Tools::redirect();
    }

    /**
     * import datas into your poche
     * @param  string $from name of the service to import : pocket, instapaper or readability
     * @todo add the return value
     * @return boolean       
     */
    public function import($from)
    {
        $providers = array(
            'pocket' => 'importFromPocket',
            'readability' => 'importFromReadability',
            'instapaper' => 'importFromInstapaper'
        );
        
        if (! isset($providers[$from])) {
            $this->messages->add('e', _('Unknown import provider.'));
            Tools::redirect();
        }
        
        $targetDefinition = 'IMPORT_' . strtoupper($from) . '_FILE';
        $targetFile = constant($targetDefinition);
        
        if (! defined($targetDefinition)) {
            $this->messages->add('e', _('Incomplete inc/poche/define.inc.php file, please define "' . $targetDefinition . '".'));
            Tools::redirect();
        }
        
        if (! file_exists($targetFile)) {
            $this->messages->add('e', _('Could not find required "' . $targetFile . '" import file.'));
            Tools::redirect();
        }
        
        $this->$providers[$from]($targetFile);
    }

    /**
     * export poche entries in json
     * @return json all poche entries
     */
    public function export()
    {
        $entries = $this->store->retrieveAll($this->user->getId());
        echo $this->tpl->render('export.twig', array(
            'export' => Tools::renderJson($entries),
        ));
        Tools::logm('export view');
    }

    public function fever()
    {
        $entries = $this->store->retrieveAllItems();
        echo $this->tpl->render('fever.twig', array(
            'fever' => Fever::renderJson(array(
	    	    'api_version' => 3,
		    'auth' => 1,
		    'last_refreshed_on_time' => 1384277813,
	    	    'items' => Fever::convertEntries($entries),
		    'total_items' => count($entries)))
        ));
        Tools::logm('fever view');
    }

    public function feverUnreadItemIds()
    {
        $entries = $this->store->retrieveAllIds($this->user->getId());
        echo $this->tpl->render('fever.twig', array(
            'fever' => Fever::renderJson(array(
	    	    'api_version' => 3,
		    'auth' => 1,
		    'last_refreshed_on_time' => 1384277813,
	    	    'unread_item_ids' => Fever::unreadItemIds($entries)))
        ));
        Tools::logm('fever view');
    }

    public function feverGroups()
    {
        echo $this->tpl->render('fever.twig', array(
            'fever' => Fever::renderJson(array(
	    	    'api_version' => 3,
		    'auth' => 1,
		    'last_refreshed_on_time' => 1384277813,
	    	    'groups' => array(array(
		    	    'id' => 1,
			    'title' => "All items")),
		    'feeds_groups' => array(array(
		            'group_id' => 1,
			    'feed_ids' => "90"))))
        ));
        Tools::logm('fever view');
    }

    public function feverFeeds()
    {
        echo $this->tpl->render('fever.twig', array(
            'fever' => Fever::renderJson(array(
	    	    'api_version' => 3,
		    'auth' => 1,
		    'last_refreshed_on_time' => 1384277813,
	    	    'feeds' => array(array(
		    	    'id' => 90,
			    'favicon_id' => 0,
			    'title' => "1024cores",
			    'url' => "http://feeds.feedburner.com/1024cores",
			    'site_url' => "http://feeds.feedburner.com/1024cores",
			    'is_spark' => 0,
			    'last_updated_on_time' => 1384281334)),
		    'feeds_groups' => array(array(
		            'group_id' => 1,
			    'feed_ids' => "90"))))
        ));
        Tools::logm('fever view');
    }

    /**
     * Checks online the latest version of poche and cache it
     * @param  string $which 'prod' or 'dev'
     * @return string        latest $which version
     */
    private function getPocheVersion($which = 'prod')
    {
        $cache_file = CACHE . '/' . $which;

        # checks if the cached version file exists
        if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 86400 ))) {
           $version = file_get_contents($cache_file);
        } else {
           $version = file_get_contents('http://static.inthepoche.com/versions/' . $which);
           file_put_contents($cache_file, $version, LOCK_EX);
        }
        return $version;
    }
}