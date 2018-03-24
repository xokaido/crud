<script>

$(document).ready( function() {

  var table = $('#example').DataTable( {
        "ajax": { "url": "/home/json/operators", "type": "post" },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "phone" },
            { "data": "last6hrs" },
            { "data": "last24hrs" },
            { "data": "last48hrs" },
            { "data": "last_call" }
        ],
        "dom":        'Bfrtip',    // Needs button container
        "select":     'single',
        "responsive": true,
        "altEditor":  true,   
        "altEditorConfigs" : [  { "addURL":    '/home/add/operators',
                                  "editURL":   '/home/edit/operators',
                                  "deleteURL": '/home/delete/operators'
                                }
                              ],
        "buttons": [{ text: 'Add',
                      name: 'add'       
                  },
                  {   extend: 'selected',
                      text: 'Edit',
                      name: 'edit'
                  },
                  {   extend: 'selected',
                      text: 'Delete',
                      name: 'delete'    
                 }]

    } );
} );

</script>
<body>
<div class="container-fluid">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" <?=( ( $page == 'home' ) ?  'class="active"' : '');?>><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li role="presentation" <?=( ( $page == 'calls' ) ?  'class="active"' : '');?>><a href="/home/calls"><i class="fa fa-phone"></i> Calls</a></li>
            <li role="presentation" <?=( ( $page == 'messages' ) ?  'class="active"' : '');?>><a href="/home/messages"><i class="fa fa-envelope"></i> Messages</a></li>
            <li role="presentation"> <a href="/login/logout"> Logout <i class="fas fa-sign-out-alt"></i> </a> </li>
          </ul>
        </nav>
        <h3 class="text-muted">Welcome <?=$user->username;?> </h3>
      </div>

      <div class="jumbotron">
        <h1>The Test Application</h1>
      </div>
      <div class="row marketing">
        <div class="col-lg-12">
          <table cellpadding="0" cellspacing="0" border="0" class="dataTable table table-striped table-responsive" id="example">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Last 6 Hours</th>
                <th>Last 24 Hours</th>
                <th>Last 48  Hours</th>
                <th>Last Call Date</th>
              </tr>
          </thead>
          <tfoot>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Last 6 Hours</th>
                <th>Last 24 Hours</th>
                <th>Last 48  Hours</th>
                <th>Last Call Date</th>
              </tr>
             </tfoot>
          </table>
        </div>
      </div>


