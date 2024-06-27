<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ url(mix('site/css/login.css')) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">
                Login
            </div>
            <div class="title signup">
                Cadastrar
            </div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Cadastro</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form action="{{ route('site.login.do') }}" class="login" method="POST">
                    @if ($errors->any())
                        <div class="alert__danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @csrf
                    <div class="field">
                        <input type="email" placeholder="Email Address" required name="email" autocomplete="off">
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" required name="password">
                    </div>
                    <div class="pass-link">
                        <a href="#">Esqueceu a senha?</a>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login">
                    </div>
                    <div class="signup-link">
                        Usuario novo? <a href="">Cadastre-se agora</a>
                    </div>
                </form>
                <form action="{{ route('site.register') }}" method="POST" class="signup">
                    @if ($errors->any())
                        <div class="alert__danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    <div class="field">
                        <input type="text" name="name" placeholder="Nome completo" required autocomplete="off">
                    </div>
                    <div class="field">
                        <input type="text" name="cpf" placeholder="CPF" maxlength="11" required autocomplete="off">
                    </div>
                    <div class="field">
                        <input type="text" name="phone" placeholder="N° telefone" required autocomplete="off">
                    </div>
                    <div class="field">
                        <input type="text" name="email" placeholder="Email" required autocomplete="off">
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Senha" required>
                    </div>

                    <div class="field">
                        <input type="password" name='password_confirmation' placeholder="Repita a senha" required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Cadastrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (() => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (() => {
            signupBtn.click();
            return false;
        });
    </script>
</body>

</html>
