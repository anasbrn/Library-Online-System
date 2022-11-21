function editBook(id){
    // document.getElementById('button').click();
    let tableBooks = {
        id      : document.querySelector(`#bookId${id}`).innerText,
        // photo   : document.getElementById(`bookPhoto${id}`).src ,
        title   : document.querySelector(`#bookTitle${id}`).innerText,
        author  : document.querySelector(`#bookAuthor${id}`).innerText,
        price   : document.querySelector(`#bookPrice${id}`).innerText,
        category: document.querySelector(`#bookCategory${id}`).innerText,
    }

    console.log(tableBooks.photo);

    // $("#editbook").modal("show");
    document.getElementById('id-book').value      = tableBooks.id,
    // document.getElementById('photo').value      = tableBooks.photo,
    document.getElementById('title').value      = tableBooks.title,
    document.getElementById('author').value     = tableBooks.author,
    document.getElementById('price').value      = tableBooks.price,
    document.getElementById('category').value   = tableBooks.category
    
    if (tableBooks.category === 'Adventure')
    {
        document.querySelector('#adventure').selected = true ;
    }

    else if (tableBooks.category === 'Fantasy')
    {
        document.querySelector('#fantasy').selected = true ;
    }

    else if (tableBooks.category === 'Mystery')
    {
        document.querySelector('#mystery').selected = true ;
    }

    else
    {
        document.querySelector('#self-improvemen').selected = true ;
    }

}

function resetForm(){
    document.querySelector('form').reset() ;
}

function usernameValidation(){
    let username        = document.getElementById('username');
    let usernamePattern = /^[a-z0-9_-]{3,15}$/ ;

    if (username.value.match(usernamePattern))
    {
        document.getElementById('register').setAttribute('type', 'submit');
        console.log(document.getElementById('register').type);
        username.classList.add("greenBorder") ;    
        username.classList.remove("redBorder") ;      
        document.getElementById('errorUsername').style.display = "none" ;   
    }

    else
    {
        document.getElementById('register').setAttribute('type', 'button');
        console.log(document.getElementById('register').type);
        username.classList.add("redBorder") ;    
        username.classList.remove("greenBorder") ;  
        document.getElementById('errorUsername').style.display = "block" ;
    }
}

function emailValidation() {
    let emailInput   = document.getElementById('email');
    let emailPattern = /[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/ ;

    if (emailInput.value.match(emailPattern))
    {
        document.getElementById('register').setAttribute('type', 'submit');
        console.log(document.getElementById('register').type);
        emailInput.classList.add('greenBorder') ;
        emailInput.classList.remove('redBorder') ;
        document.getElementById('errorEmail').style.display = "none" ;
    }

    else
    {
        document.getElementById('register').setAttribute('type', 'button');
        console.log(document.getElementById('register').type);
        emailInput.classList.add('redBorder') ;
        emailInput.classList.remove('greenBorder') ;
        document.getElementById('errorEmail').style.display = "block" ;
    }
}

function passwordValidation() {
    let password        = document.getElementById('password') ;
    let passwordPattern = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/ ;

    if (password.value.match(passwordPattern))
    {
        document.getElementById('register').setAttribute('type', 'submit');
        console.log(document.getElementById('register').type);
        password.classList.add("greenBorder") ;
        password.classList.remove("redBorder") ;
        document.getElementById('errorPassword').style.display = "none" ;
    }

    else 
    {
        document.getElementById('register').setAttribute('type', 'button');
        console.log(document.getElementById('register').type);
        password.classList.add("redBorder")
        password.classList.remove("greenBorder") ;
        document.getElementById('errorPassword').style.display = "block" ;
    }
}


// function successAdd() {
//     Swal.fire({
//         title               : "Add Successfully",
//         confirmButtonColor  : "#0d6efd",
//         icon                : "success",
//         iconColor           : "#0d6efd"  
//     })
// }

// document.getElementById("save").addEventListener('click', successAdd()) ;

