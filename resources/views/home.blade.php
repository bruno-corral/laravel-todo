<x-layout page="Home">

    <x-slot:btn>
        <a href="{{route('task.create')}}" class="btn btn-primary">
            Criar Tarefa
        </a>

        <a href="{{route('logout')}}" class="btn btn-primary">
            Sair
        </a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph_header">
            <h2>Pogresso do Dia</h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">
                <a href="{{route('home', ['date' => $date_prev_button])}}">
                    <img src="/assets/images/icon-prev.png" alt="">
                </a> 
                    {{$date_as_string}}
                <a href="{{route('home', ['date' => $date_next_button])}}">
                    <img src="/assets/images/icon-next.png" alt="">
                </a>
            </div>
        </div>
        <div class="graph_header-subtitle"> Tarefas: <b>{{$tasks_count - $undone_tasks_count}}/{{$tasks_count}}</b> </div>
        <div class="graph-placeholder"></div>
        <div class="tasks_left_footer">
            <img src="/assets/images/icon-info.png" alt="iconInfo">
            @if ($undone_tasks_count == 1)
                Resta {{$undone_tasks_count}} tarefa para ser realizada 
            @endif
            @if ($undone_tasks_count > 1 || $undone_tasks_count == 0)
                Restam {{$undone_tasks_count}} tarefas para serem realizadas 
            @endif
        </div>
    </section>
    <section class="list">
        <div class="list_header">
            <select class="list_header-select" onchange="changeTaskStatusFilter(this)">
                <option value="all_task">Todas as tarefas</option>
                <option value="task_pending">Tarefas pendentes</option>
                <option value="task_done">Tarefas realizadas</option>
            </select>
        </div>
        <div class="task_list">
            @foreach ($tasks as $task)
                <x-task :data=$task />
            @endforeach
        </div>
    </section>
    
    <script>
        async function taskUpdate(element) {
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = '{{route('task.update')}}';

            let rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json' 
                },
                body: JSON.stringify({status, taskId, _token: '{{ csrf_token() }}'}) 
            });

            result = await rawResult.json();

            if (result.success) {
                alert(result.message);
                return true;
            }

            element.checked = !status;
        }
    </script>

</x-layout>