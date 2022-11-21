<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
    <body>
        <div style="width: 100vw; height: 100vh; display: flex; justify-content: center; align-items: center; flex-direction: column">
        <form action="http://localhost:8000/api/register" method="post">
            @csrf
            <h1>Cadastro</h1>
            <section>
                Nome Completo: <input type="text" name="name">
            </section>
            
            <section>
                Email: <input type="text" name="email">
            </section>

            <section>
                Senha: <input type="text" name="password">
            </section>

            <section>
                Repita a Senha: <input type="text" name="password_confirmation">
            </section>

            <section>
                CEP: <input type="text" name="zipCode">
            </section>

            <section>
                Rua: <input type="text" name="street">
            </section>
            
            <section>
                Numero: <input type="text" name="number">
            </section>

            <section>
                Bairro: <input type="text" name="district">
            </section>

            <section>
                Cidade: <input type="text" name="city">
            </section>

            <section>
                Estado: <input type="text" name="state">
            </section>

            <div style="margin-top: 20px">
                <button>Criar Conta</button>
                <a href="/">Sign In</a>
            </div>
        </form>
        </div>
    </body>
</html>