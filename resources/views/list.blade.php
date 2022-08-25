@extends('layouts.navbar')

@section('content')

    <!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<div class=" container rounded-3 border border-2 border-dark my-5 bg-white" style="height:auto;">
    <div>
        <h1 class=" h1">To Do List</h1>
        <div class="row">
            <div class=" col-8">
                <input class=" py-3 form-control shadow" placeholder="input your task" type="text" id="inputText">
            </div>
            <div class="col-2">
                <!-- <i onclick="addList()" class=" btn btn-dark rounded-pill fas fa-4x fa-plus-circle "></i> -->
                <button onclick="addList()" class=" mt-2 btn btn-dark"> Add </button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row rounded bg-white">
        <div class=" col-12">
            <ul class=" list-group" id="list"></ul>
        </div>
    </div>
</div>
<script>
    let input = document.getElementById("inputText");
    let list= document.getElementById("list");
    let minimalValue = 3;
    let listNum = 0;
    addList=()=>{
        // get
        let inputText = filterList(input.value);
        // set
        if (inputText) {
            list.innerHTML += ` <li class=" my-3 py-3 shadow list-group-item " id="list${listNum}">
                <div class="row">
                <div class="col-1">
                <input class="" type="checkbox" id="check${listNum}" onclick="done(${listNum})">
                </div>
                <div class="col-6">
                    <span class=" h4" id="text${listNum}"> ${inputText} </span>
                </div>
                <div class="col-4">
                     <button class=" btn btn-dark" onclick="deleteList(${listNum})">Delete</button>
                     <button class=" btn btn-dark" onclick="editList(${listNum})">Edit</button>
                </div>
                 </div>
                </li> `;
            input.value=" ";
            listNum++;

        }
    }

    done=(listId)=>{
        let checkbox = document.getElementById(`check${listId}`);
        let current = document.getElementById(`text${listId}`);
        let classExit=current.classList.contains("text-decoration-line-through");
        if (classExit == true) {
            current.classList.remove("text-decoration-line-through");
        }else{
            current.classList.add("text-decoration-line-through");
        }

    }

    filterList=(x)=>{
        if (x) {
            if (x.length >= minimalValue) {
                return x;
            }
            else{
                alert("Please enter more than 3 words")
            }
        }
        else{
            return false;
        }
    }

    editList=(listId)=>{
        let currentText = document.getElementById(`text${listId}`);
        let newText = prompt("Wanna Change list?",currentText.innerHTML);
        if (filterList(newText)) {
            currentText.innerHTML = newText;
        }
    }

    deleteList=(listId)=>{
        let current = document.getElementById(`text${listId}`).innerHTML;
        let deleteComfirm = confirm(`Are you sure to delete ${current}`);
        if (deleteComfirm) {
            let p = document.getElementById("list")
            let c = document.getElementById(`list${listId}`);
            p.removeChild(c);
        }
        else{
            console.log("deleted");
        }
    };
</script>
@endsection
