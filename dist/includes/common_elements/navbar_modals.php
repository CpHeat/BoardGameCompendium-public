<!-- Sign up with email -->
<div class="modal" id="emailSignupModal" tabindex="-1" aria-labelledby="emailSignupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <span id="emailSignupError" style="font-size:15px; color:red">Here error is shown</span>
        <div class="row justify-content-between">
          <div class="col-1 d-flex justify-content-start">
            <a href="#" data-bs-toggle="modal" data-bs-target="#signupMethodModal" aria-label="Back to chosing sign up method">
              <span class="modal-back material-symbols-outlined">arrow_back</span>
            </a>
          </div>
          <div class="col-10 d-flex justify-content-center">
            <div class="container-fluid">
              <form id="emailSignupForm">
                <div class="mb-2">
                  <label for="emailSignupDisplayName" class="form-label">Display name</label>
                  <input type="text" class="form-control" id="emailSignupDisplayName" aria-describedby="emailSignupDisplayNameHelp">
                  <div id="emailSignupDisplayNameHelp" class="form-text">This will be the name others will see</div>
                </div>
                <div class="mb-2">
                  <label for="emailSignupEmail" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="emailSignupEmail">
                </div>
                <div class="mb-2">
                  <label for="emailSignupPassword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="emailSignupPassword">
                </div>
                <button type="submit" class="btn btn-primary">Sign up</button>
              </form>
            </div>
          </div>
          <div class="col-1 d-flex justify-content-end">
            <a href="#" data-bs-dismiss="modal" aria-label="Close">
              <span class="modal-close material-symbols-outlined">close</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Sign in with email -->
<div class="modal" id="emailSigninModal" tabindex="-1" aria-labelledby="emailSigninModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row justify-content-between">
          <div class="col-1 d-flex justify-content-start">
            <a href="#" data-bs-toggle="modal" data-bs-target="#signinMethodModal" aria-label="Back to chosing sign in method">
              <span class="modal-back material-symbols-outlined">arrow_back</span>
            </a>
          </div>
          <div class="col-10 d-flex justify-content-center">
            <div class="container-fluid">
              <form id="signinForm">
                <div class="mb-2">
                  <label for="signinEmail" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="signinEmail">
                </div>
                <div class="mb-2">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
              </form>
              <a href="#" data-bs-toggle="modal" data-bs-target="#forgottenPasswordModal" aria-label="Forgotten password">
              <span>Forgotten password</span>
              </a>
            </div>
          </div>
          <div class="col-1 d-flex justify-content-end">
            <a href="#" data-bs-dismiss="modal" aria-label="Close">
              <span class="modal-close material-symbols-outlined">close</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Forgotten password -->
<div class="modal" id="forgottenPasswordModal" tabindex="-1" aria-labelledby="forgottenPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row justify-content-between">
          <div class="col-1 d-flex justify-content-start">
            <a href="#" data-bs-toggle="modal" data-bs-target="#emailSigninModal" aria-label="Back to sign in">
              <span class="modal-back material-symbols-outlined">arrow_back</span>
            </a>
          </div>
          <div class="col-10 d-flex justify-content-center">
            <div class="container-fluid">
              <form id="forgottenPasswordForm">
                <div class="mb-2">
                  <label for="forgottenPasswordEmail" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="forgottenPasswordEmail">
                </div>
                <button type="submit" class="btn btn-primary">Reset password</button>
              </form>
            </div>
          </div>
          <div class="col-1 d-flex justify-content-end">
            <a href="#" data-bs-dismiss="modal" aria-label="Close">
              <span class="modal-close material-symbols-outlined">close</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Sign in method choice modal -->
<div class="modal" id="signinMethodModal" tabindex="-1" aria-labelledby="signinMethodModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row justify-content-between">
          <div class="col-1 d-flex justify-content-start">
          </div>
          <div class="col-10 d-flex justify-content-center">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#emailSigninModal">
                    <div class="modal-button email-sign-in-button">
                      <div class="content-wrapper">
                        <span class="text-container">
                          <span>Sign in with email</span>
                        </span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <a class="googleSignin">
                    <div class="modal-button google-sign-in-button">
                      <div class="content-wrapper">
                        <div class="logo-wrapper">
                          <img src="https://developers.google.com/identity/images/g-logo.png">
                        </div>
                          <span class="text-container">
                            <span>Sign in with Google</span>
                          </span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-1 d-flex justify-content-end">
            <a href="#" data-bs-dismiss="modal" aria-label="Close">
              <span class="modal-close material-symbols-outlined">close</span>
            </a>
          </div>
        </div>
        <div class="container-fluid d-flex justify-content-center">
          <a href="#" data-bs-toggle="modal" data-bs-target="#signupMethodModal"><span class="modal-mid-text mt-2">No account? Sign up now</span></a>
        </div>
      </div>      
    </div>
  </div>
</div>

<!-- Sign up method choice modal -->
<div class="modal" id="signupMethodModal" tabindex="-1" aria-labelledby="signupMethodModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row justify-content-between">
          <div class="col-1 d-flex justify-content-start">
            <a href="#" data-bs-toggle="modal" data-bs-target="#signinMethodModal" aria-label="Back to sign in">            
              <span class="modal-back material-symbols-outlined">arrow_back</span>
            </a>
          </div>
          <div class="col-10 d-flex justify-content-center">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#emailSignupModal">
                    <div class="modal-button email-sign-in-button">
                      <div class="content-wrapper">
                        <span class="text-container">
                          <span>Sign up with email</span>
                        </span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <a class="googleSignin">
                    <div class="modal-button google-sign-in-button">
                      <div class="content-wrapper">
                        <div class="logo-wrapper">
                          <img src="https://developers.google.com/identity/images/g-logo.png">
                        </div>
                        <span class="text-container">
                          <span>Sign up with Google</span>
                        </span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-1 d-flex justify-content-end">
            <a href="#" data-bs-dismiss="modal" aria-label="Close">
              <span class="modal-close material-symbols-outlined">close</span>
            </a>
          </div>
        </div>
        <div class="container-fluid d-flex justify-content-center">
          <a href="#" data-bs-toggle="modal" data-bs-target="#signupMethodModal"><span class="modal-mid-text mt-2">Forgot your password?</span></a>
        </div>
      </div>      
    </div>
  </div>
</div>












<div class="modal" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="signupForm">
        <div class="mb-3">
              <label for="signupLogin" class="form-label">Login</label>
              <input type="text" class="form-control" id="signupLogin" aria-describedby="signupLoginHelp">
              <div id="signupLoginHelp" class="form-text">Log in using your email</div>
          </div>
          <div class="mb-3">
              <label for="signupEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="signupEmail" aria-describedby="signupEmailHelp">
              <div id="signupEmailHelp" class="form-text">Log in using your email</div>
          </div>
          <div class="mb-3">
              <label for="signupPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="signupPassword">
          </div>
          <button type="submit" class="btn btn-primary">Sign Up</button>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#emailSigninModal">Back to signin</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>