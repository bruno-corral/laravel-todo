function changeTaskStatusFilter(element) {
    showAllTasks();

    if (element.value == 'task_pending') {
        document.querySelectorAll('.task_done').forEach(function(element) {
            element.style.display = 'none';
        });
    }

    if (element.value == 'task_done') {
        document.querySelectorAll('.task_pending').forEach(function(element) {
            element.style.display = 'none';
        });
    }
}

function showAllTasks() {
    document.querySelectorAll('.task').forEach(function(element) {
        element.style.display = 'flex';
    });
}