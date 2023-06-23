function finalizadaChange(selectElement) {
    var saveButton = selectElement.parentElement.querySelector('.save-button');
    if (selectElement.value === "{{ $tarefa->finalizada }}") {
        saveButton.style.display = 'none';
    } else {
        saveButton.style.display = selectElement.value === 'True' ? 'inline-block' : 'none';
    }
}

function tarefasMembros() {
    var hide = document.getElementsByClassName("task-list")[0]
    var button = document.getElementsByClassName("search-container")[0]
    hide.style.display = 'none'
    button.style.display = 'block'

}

function todasTarefas() {
    var show = document.getElementsByClassName("task-list")[0]
    var button = document.getElementsByClassName("search-container")[0]
    var tasks = document.getElementsByClassName("task")
    show.style.display = 'block'
    button.style.display = 'none'
    for (var i = 0; i < tasks.length; i++) {
        var task = tasks[i];
        task.style.display = 'block';
      }

}

function showTarefaMembro(membroId) {
    var show = document.getElementsByClassName("task-list")[0]
    var tasks = document.getElementsByClassName('task');
    show.style.display = 'block'
    for (var i = 0; i < tasks.length; i++) {
      var task = tasks[i];
      var taskMemberId = task.getAttribute('data-member-id');

      if (taskMemberId !== membroId) {
        task.style.display = 'none';
      } else {
        task.style.display = 'block';
      }
    }
}

function show(){
    var description_element = event.target.parentNode.parentNode.querySelector('.task-description');
    var termino_element = event.target.parentNode.parentNode.querySelector('.task-finalized');
    var taskId = parseInt(description_element.dataset.taskId);
    var index = dados.findIndex(task => task.id === (taskId))
    var description = dados[index].descricao
    var data_termino = dados[index].data_termino
    if (description === null){
        description = ''
    }
    if (data_termino === null){
        data_termino = ''
    }

    description_element.innerHTML = '<strong>Descrição:</strong><br>' + description;
    termino_element.innerHTML = '<strong>Data Término:</strong>' + data_termino;
    if (description_element.style.display === 'none' & termino_element.style.display === 'none') {
        description_element.style.display = 'block'
        termino_element.style.display = 'block'
    } else {
        termino_element.style.display = 'none'
        description_element.style.display = 'none'
    }

}
