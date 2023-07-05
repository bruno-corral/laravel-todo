<x-layout page="Login">

    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Registre-se
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Faça seu login</h1>

        @if ($errors->any())
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{route('user.loginAction')}}">
            @csrf
            
            <x-form.textInput type="email" name="email" label="E-mail" placeholder="E-mail" required="required" />
            <x-form.textInput type="password" name="password" label="Senha" placeholder="Senha" required="required" />
            <x-form.formButton resetTxt="Limpar" submitTxt="Login" />
        </form>
    </section>
</x-layout>
