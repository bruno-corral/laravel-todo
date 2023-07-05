<x-layout page="Registrar-se">

    <x-slot:btn>
        <a href="{{route('login')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Cadastro de usuário</h1>

        @if ($errors->any())
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{route('user.registerAction')}}">
            @csrf
            
            <x-form.textInput name="name" label="Nome" placeholder="Nome" required="required" />
            <x-form.textInput type="email" name="email" label="E-mail" placeholder="E-mail" required="required" />
            <x-form.textInput type="password" name="password" label="Senha" placeholder="Senha" required="required" />
            <x-form.textInput type="password" name="password_confirmation" label="Confirme sua Senha" placeholder="Confirme sua Senha" required="required" />
            <x-form.formButton resetTxt="Limpar" submitTxt="Registrar-se" />
        </form>
    </section>
</x-layout>
