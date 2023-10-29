const btnDelete = document.querySelectorAll('[data-bs-target="#delete_modal"]');

btnDelete.forEach((button) => {
  button.addEventListener("click", () => {
    const id = button.parentElement.parentElement.children[0].innerText;
    const input = document.querySelector('#delete_modal form input[name="id"]');

    input.setAttribute("value", id);
  });
});

console.log(btnDelete);
