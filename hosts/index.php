
<?php
if (!file_exists(__DIR__ . "/../config.php")) {
    header("Location: ../install/");
}
session_start();
require_once __DIR__ . "/../classes/loader.php";
require_once __DIR__ . "/../login.php";
if (!User::canPerformAction($sql, $_SESSION['user_id'], Constants::$PANEL_ADMIN)) {
    header("Location: ../");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta id="themecolor" name="theme-color" content="<?php echo $_SESSION['style_bg']; ?>">
        <title>Hosts | <?php echo Constants::$PANEL_NAME; ?></title>
        <?php echo Constants::getCSS($HOST_URL . "/static"); 
        echo Constants::getPreferencedCSS($HOST_URL . "/static", $_SESSION['style']);
        ?>
        
    </head>
    <body>
        <div class="wrapper">
            <?php require_once __DIR__ . "/../static/html/header_aside.php"; ?>
            <section>
                <div class="content-wrapper">
                    <div class="content-heading">
                        Hosts
                        <small>Here you can handle all the host servers included into this server.</small>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel janno-panel">
                                <div class="panel-heading">
                                    Hosts
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive table-bordered">
                                        <table class="table table-hover">
                                            <thead>
                                            <th>Server name</th>
                                            <th>Host:Port</th>
                                            <th>Host username</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $hosts = Host::getHosts($sql, null);
                                                foreach ($hosts as $host) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $host['servername']; ?></td>
                                                    <td><?php echo $host['hostname'] . ":" . $host['sshport']; ?></td>
                                                    <td><?php echo $host['host_username'] ?></td>
                                                    <td><button type="button" class="btn btn-default btn-block" onclick="initEditHostModal('hostModal', '<?php echo $host['host_id'];?>');">Edit host</button></td>
                                                </tr>
                                                <?php }
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <button type="button" class="btn btn-default btn-block" onclick="$('#addHost').val(1);$('#deleteHost').val(0);$('#updateHost').val(0);$('#hostModal').modal();">Add new host</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel janno-panel">
                                <div class="panel-heading">
                                    Information
                                </div>
                                <div class="panel-body">
                                    <?php
                                    $dat = getStats($sql);
                                    ?>
                                    The panel hosts a total of <?php echo $dat['totalServers']; ?> server(s), from which, <?php echo $dat['runningServers']; ?> is/are currently running. <br>It has <?php echo $dat['totalUsers']; ?> user accounts, out of which <?php echo $dat['extUsers']; ?> of them derive from an external system and <?php echo $dat['localUsers']; ?> of them is registered locally.<br><?php echo $dat['extAuth']; ?><br><?php echo $dat['mailer']; ?>
                                    <br>
                                    <br>
                                    Did you know that by clicking <b><em class="icon-wrench"></em>Themes</b> from the upper bar, you can change the color theme of the panel?
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <div id="hostModal" role="dialog" aria-labelledby="gameModalTitle" aria-hidden="true" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 id="hostModalTitle" class="modal-title">Add a new host</h4>
                    </div>
                    <div class="modal-body" id="hostModalBody">
                         <div class="panel janno-panel" id="formMsgPanel" hidden>
                        <div class="panel-heading" id="formTitle">
                            
                        </div>
                        <div class="panel-body" id="formMsg">
                            
                        </div>
                        
                    </div>
                        <form id="hostForm" role="form" method="post" action="../functions.php">
                            <input id='addHost' type="hidden" name="addHost" value="1">
                            <input id='deleteHost' type="hidden" name="deleteHost" value="0">
                            <input id='hostId' type="hidden" name="hostId" value="0">
                            <input id='updateHost' type="hidden" name="updateHost" value="1">
                            <div class="form-group">
                                <label>Server name</label>
                                <input id='servername' type="text" name="servername" class="form-control" required placeholder="Friendly name for the server (so it would be easier to recognize)">
                                
                            </div>
                            <div class="form-group">
                                <label>Server hostname</label>
                                <input id='hostname' type="text" name="hostname" class="form-control" required placeholder="Hostname of the server">
                                <small>Can be IP, can be a domain</small>
                            </div>
                            <div class="form-group">
                                <label>SSH Port</label>
                                <input type="number" class="form-control" name="sshport" id="sshport" required placeholder="SSH port of the server">
                            </div>
                            <div class="form-group">
                                <label>Host Username</label>
                                <input type="text" class="form-control" name="host_username" id="host_username" required placeholder="Host username of the server">
                            </div>
                            <div class="form-group">
                                <label>Host Password</label>
                                <input type="password" class="form-control" name="host_password" id="host_password" required placeholder="Host password of the server">
                                <small>This value is required if you're making any sort of a change to the connection.</small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-block">Submit</button>
                            </div>
                        </form>
                        
                        
                        </div>
                    <div class="modal-footer">
                        <div class="clearfix">
                            
                            <div class="pull-right">
                                <div id="deleteGameBtn" hidden class="pull-left">
                                <button  type="button" class="btn btn-danger" onclick="$('#addHost').val(0);$('#deleteHost').val(1);$('#updateHost').val(0);$('#hostForm').submit();" >Delete</button>
                                </div>&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                            </div>
                        </div>
                    </div>
                </div> </div>
            </div>
        
        <?php echo Constants::getJS($HOST_URL . "/static"); ?>
        <script>handleForm("hostForm");</script>
    </body>
</html>
