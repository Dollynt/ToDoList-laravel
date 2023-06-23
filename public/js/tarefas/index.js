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
    show.style.display = 'block'
    button.style.display = 'none'
}


function show(){
    var description_element = event.target.parentNode.parentNode.querySelector('.task-description');
    var taskId = parseInt(description_element.dataset.taskId);
    var index = dados.findIndex(task => task.id === (taskId))
    var description = dados[index].descricao
    if (description === null){
        description = ''
    }

    description_element.innerText = 'Descrição:\n'+description
    if (description_element.style.display === 'none') {
        description_element.style.display = 'block'
    } else {
        description_element.style.display = 'none'
    }

}
