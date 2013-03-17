<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css" />
  <script src="http://code.jquery.com/jquery-1.8.2.min.js">
  </script>
  <script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js">
  </script>
  <script type="text/javascript" src="js/login.js">
  </script>
  </head>
  <body>
	<div id="page" data-role="page">
      <div id="header" data-role="header">
        <h1>
          Fisherman Diary - Login 
        </h1>
      </div>
      <div id="content" data-role="content">
		<form>
          <div id="loginForm">
			<h2>
              Enter your Username and Password to login 
              </h2>
              <div id="usernameDiv" data-role="field-contain">
				<input type="text" name="username" placeholder="Username" id="username"/>
              </div>
              <!-- end usernameDiv -->
              <div id="passwordDiv" data-role="field-contain">
				<input type="password" name="password" placeholder="Password" id="password"/>
              </div>
              <!-- end passwordDiv -->
              <div id="loginButtonDiv" data-role="field-contain">
				<button name="login" type="submit" data-inline="true">
                  Login
              </button>
              </div>
              <!-- end loginButtonDiv -->
              
          </div>
          </form>
          <div id="content" data-role="content">
			<div id="LoginForm">
              <h1>
                Enter your credentials to login 
              </h1>
          </div>
          
          </div>
          <div id="footer" data-role="footer">
			<h1>
              Bosco Mitchell 
          </h1>
          </div>
      </div>
  </body>
  </html>