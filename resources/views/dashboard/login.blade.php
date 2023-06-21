@extends('layouts.main')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
.container.forms{
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    /* background-color: #4070f4; */
    column-gap: 30px;
}
.form{
    position: absolute;
    max-width: 430px;
    width: 100%;
    padding: 30px;
    border-radius: 6px;
    background: #FFF;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;

}
.form.signup{
    opacity: 0;
    pointer-events: none;
}
.forms.show-signup .form.signup{
    opacity: 1;
    pointer-events: auto;
}
.forms.show-signup .form.login{
    opacity: 0;
    pointer-events: none;
}
.user-login{
    font-size: 28px;
    font-weight: 600;
    color: #232836;
    text-align: center;
}
form{
    margin-top: 30px;
}
.form .field{
    position: relative;
    height: 50px;
    width: 100%;
    margin-top: 20px;
    border-radius: 6px;
}
.field input,
.field button{
    height: 100%;
    width: 100%;
    border: none;
    font-size: 16px;
    font-weight: 400;
    border-radius: 6px;
}
.field input{
    outline: none;
    padding: 0 15px;
    border: 1px solid#CACACA;
}
.field input:focus{
    border-bottom-width: 2px;
}
.eye-icon{
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    font-size: 18px;
    color: #8b8b8b;
    cursor: pointer;
    padding: 5px;
}
.field button{
    color: #000;
    background-color: white;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 1px solid #000;
    border-radius: 2px;
}
.field button:hover{
    background-color: #000;
    color: white;
}
.form-link{
    text-align: center;
    margin-top: 10px;
}
.form-link span,
.form-link a{
    font-size: 14px;
    font-weight: 400;
    color: #232836;
}
.form a{
    color: #0171d3;
    text-decoration: none;
}
.form-content a:hover{
    text-decoration: underline;
}
.line{
    position: relative;
    height: 1px;
    width: 100%;
    margin: 36px 0;
    background-color: #d4d4d4;
}
.line::before{
    content: 'Or';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #FFF;
    color: #8b8b8b;
    padding: 0 15px;
}
.media-options a{
    display: flex;
    align-items: center;
    justify-content: center;
}
a.facebook{
    color: #fff;
    background-color: #4267b2;
}
a.facebook .facebook-icon{
    height: 28px;
    width: 28px;
    color: #0171d3;
    font-size: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fff;
}
.facebook-icon,
img.google-img{
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
}
img.google-img{
    height: 20px;
    width: 20px;
    object-fit: cover;
}
a.google{
    border: 1px solid #CACACA;
}
a.google span{
    font-weight: 500;
    opacity: 0.6;
    color: #232836;
}
@media screen and (max-width: 400px) {
    .form{
        padding: 20px 10px;
    }
    
}
</style>
<section class="container forms">
    <div class="form login">
        <div class="form-content">
            <header class="user-login">Login</header>
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{route('user.login.form')}}" method="post">
                @csrf
                <div class="field input-field">
                    <input type="email" placeholder="Email" name="email" class="input">
                </div>
                <div class="field input-field">
                    <input type="password" placeholder="Password" name="password" class="password">
                    <i class='bx bx-hide eye-icon'></i>
                </div>
                <div class="form-link">
                </div>
                <div class="field button-field">
                    <button type="submit">Login</button>
                </div>
            </form>
            <div class="line"></div>
            <div class="form-link">
                <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
            </div>
        </div>
        {{-- <div class="media-options">
            <a href="#" class="field facebook">
                <i class='bx bxl-facebook facebook-icon'></i>
                <span>Login with Facebook</span>
            </a>
        </div>
        <div class="media-options">
            <a href="#" class="field google">
                <i class='bx bxl-google facebook-icon'></i>
                <span>Login with Google</span>
            </a>
        </div> --}}
    </div>
    <!-- Signup Form -->
    <div class="form signup">
        <div class="form-content">
            <header class="user-login">Signup</header>
            <form action="{{route('user.register.form')}}" method="POST">
                @csrf
                <div class="field input-field">
                    <input type="text" placeholder="Name" name="name" class="input">
                </div>
                <div class="field input-field">
                    <input type="email" placeholder="Email" name="email" class="input">
                </div>
                <div class="field input-field">
                    <input type="password" placeholder="Create password" name="password" class="password">
                </div>
                <div class="field input-field">
                    <input type="number" placeholder="Phone Number" name="phone" class="password">
                    <i class='bx bx-hide eye-icon'></i>
                </div>
                <div class="field button-field">
                    <button type="submit">Signup</button>
                </div>
            </form>
            <div class="line"></div>
            <div class="form-link">
                <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
            </div>
        </div>
        {{-- <div class="media-options">
            <a href="#" class="field facebook">
                <i class='bx bxl-facebook facebook-icon'></i>
                <span>Login with Facebook</span>
            </a>
        </div>
        <div class="media-options">
            <a href="#" class="field google">
                <i class='bx bxl-google facebook-icon'></i>
                <span>Login with Google</span>
            </a>
        </div> --}}
    </div>
</section>
<script>
    const forms = document.querySelector(".forms"),
        pwShowHide = document.querySelectorAll(".eye-icon"),
        links = document.querySelectorAll(".link");
  
  pwShowHide.forEach(eyeIcon => {
      eyeIcon.addEventListener("click", () => {
          let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
          
          pwFields.forEach(password => {
              if(password.type === "password"){
                  password.type = "text";
                  eyeIcon.classList.replace("bx-hide", "bx-show");
                  return;
              }
              password.type = "password";
              eyeIcon.classList.replace("bx-show", "bx-hide");
          })
          
      })
  })      
  
  links.forEach(link => {
      link.addEventListener("click", e => {
         e.preventDefault(); //preventing form submit
         forms.classList.toggle("show-signup");
      })
  })
  </script>

  @endsection