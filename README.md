fishdiary
=========FLICKR 3.1
Installing CodeIgniter

You can download CodeIgniter by going to this link: http://codeigniter.com/downloads/. Configure the base URL by editing the file application/config/config.php. If you use Apache Server, you can edit the file directly on the server using the default text editor provided. In order to point to your server, this file should include the line: $config [‘base_url'] = http://localhost/ci/;

    Set your database settings by editing the application/config/database.php file.
    Test to see if CodeIgniter is working by typing http://localhost/ci/ on your browser:
    A Welcome page should come up showing that CodeIgniter is installed and working on your server.

Creating a simple application

    Open the system/application/config/database.phpfile. Set the array items to correspond to values. Remember to set the auto load feature by adding “database” to the libraries array (system/application/config/autoload.php) like this: $autoload[‘libraries'] = array (‘database’).
    Delete the welcome.php default controller from the Controllers folder (system/application/controllers).
    Open and edit the routes.php file (system/application/config/routes.php) by pointing the array item to the right controller ($route [‘default_controller'] = “testing”)

In this example, we have changed the default array item to point to the “testing” controller.

Now you can delete the system/application/view/welcome_message.php file as well since you don’t need it anymore.

    Create the “Testing” database through a MySQL client like phpMyAdmin.
    Create the model by creating the php file Testing_model.php.
    Save the above file in the folder System/application/models.
    Open the testing_model.php file, create a class, model construct and a function as shown below:

<?php

class Testing_model extends CI_Model {

function Testing_model()

{

// Call the Model constructor

parent::_construct();

}

function getData()

{

//Query the data table for every record and row

$query = $this->db->get('data');

if ($query->num_rows() > 0)

{

return $query->result();

}else{

//show_error('Database is empty!');

}

}

}

?>

Create the Controller that will be used to load the model and display the view by creating the testing.php file in the folder System/application/controllers.

Add the code below to the file:

<?php

Class Testing extends CI_Controller{

function index()

{

$this->load->model('testing_model');

$data['result'] = $this->testing_model-><span class="sql">getData</span>();

$data['page_title'] = "CodeIgniter Testing App!";

$this->load->view('testing_view',$data);

}

}

?>

The above code creates the Testing class and a function called index. The function is then used to load the model, query the database and pass the results to the view.

Create the View file testing_view.php in the folder System/application/view. Since this is the file that a user will see and interact with, it will contain the normal html and php elements needed as shown below:

<html>

<head>

<title><?=$page_title?></title>

</head>

<body>

<?php foreach($result as $row):?>

<h3><php?=$row->title?></h3>

<p><php?=$row->text?></p>

<br />

<?php endforeach;?>

</body>

</html>

Add the following code to the .htaccess file located in the root folder of your server:

RewriteEngine on

RewriteCond $1 !^(index\.php|images|robots\.txt)

RewriteRule ^(.*)$ ci/index.php/$1 [L]

Open the System/application/config/config.pp file and edit as shown below:

$config [‘index_page'] = “”;

CodeIgniter can be used to create shopping carts, build RSS 2.0 feeds, create a contact manager, create a jobs board among other things.