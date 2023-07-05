<x-layout page="Criar Tarefa">

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Criar Tarefa</h1>
        <form method="POST" action="{{route('task.createAction')}}">
            @csrf
            
            <x-form.textInput name="title" label="Título da tarefa" placeholder="Digite o título da tarefa" required="required" />
            <x-form.textInput type="datetime-local" name="due_date" label="Data de realização" placeholder="Escolha a data da tarefa" required="required" />
            <x-form.selectInput name="category_id" label="Categoria" required="required">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>    
                @endforeach
            </x-form.selectInput>
            <x-form.textareaInput name="description" label="Descrição da tarefa" placeholder="Digite uma descrição para sua tarefa" required="required" />
            <x-form.formButton resetTxt="Resetar" submitTxt="Criar Tarefa" />
        </form>
    </section>
</x-layout>
