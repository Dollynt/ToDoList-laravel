document.addEventListener('DOMContentLoaded', function() {
    var selectElement = document.getElementById('finalizada');
    var saveButton = document.querySelector('.save-button');

    selectElement.addEventListener('change', function() {
      if (selectElement.value === "{{ $tarefa->finalizada }}") {
        saveButton.style.display = 'none';
      } else {
        saveButton.style.display = selectElement.value === 'True' ? 'inline-block' : 'none';
      }
    });
  });


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
