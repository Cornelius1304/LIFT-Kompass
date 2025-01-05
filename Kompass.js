const sidebar = document.getElementById('sidebar')

function toggleSidebar(){
    sidebar.classList.toggle('close')
}

function toggleDropdown(button){
    button.nextElementSibling.classList.toggle('show')
    button.classList.toggle('rotate')
}