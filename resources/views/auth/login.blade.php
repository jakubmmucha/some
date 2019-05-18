<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>
<style>
   
</style>
</head>
   
<body     style="background-image:url('images/logo.jpg'); background-position: top center; background-attachment: fixed;background-repeat:no-repeat;background-size:cover;" class="img-fluid" alt="Responsive image" >
    
        <div class="container">    
                <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                    <div class="panel panel-info" >
                            <div class="panel-heading">
                                <div class="panel-title">Sign In</div>
                                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                            </div>     
        
                            <div style="padding-top:30px" class="panel-body" >
        
                                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                                    
                                <form id="loginform" class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                            
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="username or email">  
                                             
    
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif                                      
                                            </div>
                                        
                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input id="login-password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password">
                                                

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            
        
                                        
                                    <div class="input-group">
                                              <div class="checkbox">
                                                <label>
                                                  <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                                </label>
                                              </div>
                                            </div>
        
        
                                        <div style="margin-top:10px" class="form-group">
                                            <!-- Button -->
        
                                            <div class="col-sm-12 controls">
                                              
                                              <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                                             
        
                                            </div>
                                        </div>
        
        
                                        <div class="form-group">
                                            <div class="col-md-12 control">
                                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                                    Don't have an account! 
                                                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                                    Sign Up Here
                                                </a>
                                                </div>
                                            </div>
                                        </div>    
                                    </form>     
        
        
        
                                </div>                     
                            </div>  
                </div>
                <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="panel-title">Sign Up</div>
                                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                                </div>  
                                <div class="panel-body" >
                                    <form id="signupform" class="form-horizontal"  method="POST" action="{{ route('register') }}">
                                           
                                                    @csrf
                                        
                                        <div id="signupalert" style="display:none" class="alert alert-danger">
                                            <p>Error:</p>
                                            <span></span>
                                        </div>
                                            
                                        
                                          
                                        <div class="form-group">
                                            <label for="email" class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email Address">
                                        

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label for="firstname" class="col-md-3 control-label">Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                                                

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="password" class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                            

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="password" class="col-md-3 control-label">Confirm Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                                   
                                                </div>
                                            </div>
                                           
                                            
                                        <div class="form-group">
                                            
                                          
                                        </div>
        
                                        <div class="form-group">
                                            <!-- Button -->                                        
                                            <div class="col-md-offset-3 col-md-9">
                                                
                                                <button type="submit" class="btn btn-primary">
                                                        {{ __('Register') }}
                                                    </button>
                                                <span style="margin-left:8px;"></span>  
                                            </div>
                                        </div>
                                        
                                        <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                            
                                                                                     
                                                
                                        </div>
                                        
                                        
                                        
                                    </form>
                                 </div>
                            </div>
        
                       
                       
                        
                 </div> 
            </div>
            
</body>
</html>