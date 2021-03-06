            <header class="topnavbar-wrapper">
                <nav role="navigation" class="navbar topnavbar">
                    <div class="navbar-header">
                        <a href="<?php echo $HOST_URL; ?>" class="navbar-brand">
                            <div class="brand-logo">
                                <em class="fa fa-home fa-2x" style="color: white;"></em>
                            </div>
                            <div class="brand-logo-collapsed">
                                <em class="fa fa-home fa-2x" style="color: white;"></em>
                            </div>
                        </a>
                    </div>
                    <div class="nav-wrapper">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                                    <em class="fa fa-navicon"></em> Toggle sidebar
                                </a>
                                <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
                                    <em class="fa fa-navicon"></em>
                                </a>
                            </li>
                            
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" onclick="window.location.search += '&logout'">
                                    <em class="icon-login"></em> Log out
                                </a>
                            </li>
                            <li>
                                <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                                    <em class="icon-wrench"></em> Themes
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="aside">
                <div class="aside-inner">
                    <nav data-sidebar-anyclick-close="" class="sidebar">
                        <ul class="nav">
                            <li class="nav-heading">
                                <span>Q3Panel</span>
                            </li>
                            <li>
                                <a href="<?php echo "$HOST_URL/"; ?>" title="Home">
                                    <em class="icon-home"></em>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="nav-heading">
                                <span>Server management</span>
                            </li>
                            <li>
                                <a href="<?php echo "$HOST_URL/servers/"; ?>" title="Servers">
                                    <em class="fa fa-server"></em>
                                    <span>Game servers</span>
                                </a>
                            </li><?php if (User::canPerformAction($sql, $_SESSION['user_id'], Constants::$PANEL_ADMIN)) {
                             ?><li>
                                <a href="<?php echo "$HOST_URL/hosts/"; ?>" title="Host servers">
                                    <em class="fa fa-desktop"></em>
                                    <span>Host servers</span>
                                </a>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo "$HOST_URL/tickets/"; ?>" title="Tickets">
                                    <em class="fa fa-ticket"></em>
                                    <span>Tickets</span>
                                </a>
                            </li>
                            <li class="nav-heading">
                                <span>Management</span>
                            </li>
                            <li>
                                <a href="<?php echo "$HOST_URL/users/"; ?>" title="Users">
                                    <em class="icon-user"></em>
                                    <span>Users</span>
                                </a></li>
                                <?php if (User::canPerformAction($sql, $_SESSION['user_id'], Constants::$PANEL_ADMIN)) { ?>
                                <li>
                                <a href="<?php echo "$HOST_URL/game/"; ?>" title="Users">
                                    <em class="icon-settings"></em>
                                    <span>Game setup</span>
                                </a>
                                </li>
                                <li>
                                <a href="<?php echo "$HOST_URL/preferences/"; ?>" title="Panel preferences">
                                    <em class="fa fa-cog"></em>
                                    <span>Panel preferences</span>
                                </a>
                                </li>    
                                <?php } if (User::canPerformAction($sql, $_SESSION['user_id'], Constants::$SERVER_ADMIN)) { ?>
                                <li><a href="#logs" title="Logs" data-toggle="collapse">
                                        <em class="fa fa-history"></em>
                                        <span>Logs</span>
                                </a>
                                
                                <ul id="logs" class="nav sidebar-subnav collapse">
                                    <?php if (User::canPerformAction($sql, $_SESSION['user_id'], Constants::$PANEL_ADMIN)) { ?>
                                    <li>
                                        <a href="<?php echo "$HOST_URL/logs/panel/"; ?>" title="Panel logs">
                                            <em class="fa fa-columns"></em>
                                            <span>Panel logs</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?php echo "$HOST_URL/logs/server/"; ?>" title="Server logs">
                                            <em class="fa fa-server"></em>
                                            <span>Server logs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo "$HOST_URL/logs/login/"; ?>" title="Failed logins">
                                            <em class="fa fa-times"></em>
                                            <span>Failed logins</span>
                                        </a>
                                    </li>
                                </ul></li><?php } ?>
                            <li class="nav-heading">
                                <span>Links</span>
                            </li>
                            <li>
                                <a href="https://www.github.com/JannoEsko/q3panel/" target="_blank" title="GitHub Repository">
                                    <em class="fa fa-github"></em>
                                    <span>GitHub Repository</span>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </aside>
            <aside class="offsidebar hide">
                <nav>
                    <div role="tabpanel">
                        <div class="tab-content">
                            <div id="app-settings" role="tabpanel" class="tab-pane fade in active">
                                <h3 class="text-center text-thin"></h3>
                                <div class="p">
                                    <h4 class="text-muted text-thin">Themes</h4>
                                    <div class="table-grid mb">
                                        <div class="col mb">
                                            <div class="setting-color" onclick="setPreferencedTheme('theme-a.css');">
                                                <label data-load-css="<?php echo "$HOST_URL/static/"; ?>css/theme-a.css">
                                                    <input type="radio" name="setting-theme"<?php if ($_SESSION['style'] === "theme-a.css") echo " checked=\"checked\""; ?>>
                                                    <span class="icon-check"></span>
                                                    <span class="split">
                                                        <span class="color bg-info"></span>
                                                        <span class="color bg-info-light"></span>
                                                    </span>
                                                    <span class="color bg-white"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mb">
                                            <div class="setting-color" onclick="setPreferencedTheme('theme-b.css');">
                                                <label data-load-css="<?php echo "$HOST_URL/static/"; ?>css/theme-b.css">
                                                    <input type="radio" name="setting-theme"<?php if ($_SESSION['style'] === "theme-b.css") echo " checked=\"checked\""; ?>>
                                                    <span class="icon-check"></span>
                                                    <span class="split">
                                                        <span class="color bg-green"></span>
                                                        <span class="color bg-green-light"></span>
                                                    </span>
                                                    <span class="color bg-white"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mb">
                                            <div class="setting-color" onclick="setPreferencedTheme('theme-c.css');">
                                                <label data-load-css="<?php echo "$HOST_URL/static/"; ?>css/theme-c.css">
                                                    <input type="radio" name="setting-theme"<?php if ($_SESSION['style'] === "theme-c.css") echo " checked=\"checked\""; ?>>
                                                    <span class="icon-check"></span>
                                                    <span class="split">
                                                        <span class="color bg-purple"></span>
                                                        <span class="color bg-purple-light"></span>
                                                    </span>
                                                    <span class="color bg-white"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mb">
                                            <div class="setting-color" onclick="setPreferencedTheme('theme-d.css');">
                                                <label data-load-css="<?php echo "$HOST_URL/static/"; ?>css/theme-d.css">
                                                    <input type="radio" name="setting-theme"<?php if ($_SESSION['style'] === "theme-d.css") echo " checked=\"checked\""; ?>>
                                                    <span class="icon-check"></span>
                                                    <span class="split">
                                                        <span class="color bg-danger"></span>
                                                        <span class="color bg-danger-light"></span>
                                                    </span>
                                                    <span class="color bg-white"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-grid mb">
                                        <div class="col mb">
                                            <div class="setting-color" onclick="setPreferencedTheme('theme-e.css');">
                                                <label data-load-css="<?php echo "$HOST_URL/static/"; ?>css/theme-e.css">
                                                    <input type="radio" name="setting-theme"<?php if ($_SESSION['style'] === "theme-e.css") echo " checked=\"checked\""; ?>>
                                                    <span class="icon-check"></span>
                                                    <span class="split">
                                                        <span class="color bg-info-dark"></span>
                                                        <span class="color bg-info"></span>
                                                    </span>
                                                    <span class="color bg-gray-dark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mb">
                                            <div class="setting-color" onclick="setPreferencedTheme('theme-f.css');">
                                                <label data-load-css="<?php echo "$HOST_URL/static/"; ?>css/theme-f.css">
                                                    <input type="radio" name="setting-theme"<?php if ($_SESSION['style'] === "theme-f.css") echo " checked=\"checked\""; ?>>
                                                    <span class="icon-check"></span>
                                                    <span class="split">
                                                        <span class="color bg-green-dark"></span>
                                                        <span class="color bg-green"></span>
                                                    </span>
                                                    <span class="color bg-gray-dark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mb">
                                            <div class="setting-color" onclick="setPreferencedTheme('theme-g.css');">
                                                <label data-load-css="<?php echo "$HOST_URL/static/"; ?>css/theme-g.css">
                                                    <input type="radio" name="setting-theme"<?php if ($_SESSION['style'] === "theme-g.css") echo " checked=\"checked\""; ?>>
                                                    <span class="icon-check"></span>
                                                    <span class="split">
                                                        <span class="color bg-purple-dark"></span>
                                                        <span class="color bg-purple"></span>
                                                    </span>
                                                    <span class="color bg-gray-dark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col mb">
                                            <div class="setting-color" onclick="setPreferencedTheme('theme-h.css');">
                                                <label data-load-css="<?php echo "$HOST_URL/static/"; ?>css/theme-h.css">
                                                    <input type="radio" name="setting-theme"<?php if ($_SESSION['style'] === "theme-h.css") echo " checked=\"checked\""; ?>>
                                                    <span class="icon-check"></span>
                                                    <span class="split">
                                                        <span class="color bg-danger-dark"></span>
                                                        <span class="color bg-danger"></span>
                                                    </span>
                                                    <span class="color bg-gray-dark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </nav>
            </aside>
