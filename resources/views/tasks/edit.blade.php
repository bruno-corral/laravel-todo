<x-layout page="Editar Tarefa">

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Editar Tarefa</h1>
        <form method="POST" action="{{route('task.editAction')}}">
            @csrf
            <input type="hidden" name="id" value="{{$task->id}}">
            <x-form.textInput name="title" label="Título da tarefa" placeholder="Digite o título da tarefa" value="{{$task->title}}" required="required" />
            <x-form.textInput type="datetime-local" name="due_date" label="Data de realização" value="{{$task->due_date}}" required="required" />
            <x-form.selectInput name="category_id" label="Categoria" required="required">
                @foreach ($categories as $category)
                <option value="{{$category->id}}" 
                    @if ($category->id == $task->category_id)
                        selected
                    @endif
                >{{$category->title}}</option>    
                @endforeach
            </x-form.selectInput>
            <x-form.textareaInput name="description" label="Descrição da tarefa" placeholder="Digite uma descrição para sua tarefa" value="{{$task->description}}" required="required" />
            <x-form.checkboxInput name="is_done" label="Tarefa Realizada?" checked="{{$task->is_done}}" />
            <x-form.formButton resetTxt="Resetar" submitTxt="Atualizar Tarefa" />
        </form>
    </section>
</x-layout>
