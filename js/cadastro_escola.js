// Configurações do Radio Button - Tipo de escola
let valueRadioSchool = 0;

function handleClickType(radioTypeSchool) {
    console.log('New value: ' + radioTypeSchool.value);
    valueRadioSchool = radioTypeSchool.value;

    document.querySelector('.schoolForm .formPersonalData .formPersonalDataInput .selectInitials').style.display = 'inline';
    
    if (valueRadioSchool === '2') {
        document.querySelector('.selectInitials option[value="emeif"]').innerHTML = "Comunitária";
        document.querySelector('.selectInitials option[value="emef"]').innerHTML = "Confessional";
        document.querySelector('.selectInitials option[value="emei"]').innerHTML = "OSC";
        document.querySelector('.selectInitials option[value="uei"]').innerHTML = "Privada";
        document.querySelector('.selectInitials option[value="osc"]').style.display = 'none';
    }
}

// Configuração do Radio Button - Convênio com a Semec
let valueRadioPact = 0;

function handleClickPact(radioPact) {
    console.log('New value: ' + radioPact.value);
    valueRadioPact = radioPact.value;
    
    if (valueRadioPact === 'yes') {
        document.querySelector('.schoolForm .formTechnicalData .formTechnicalDataInput .areaPact').style.display = 'inline';
        document.querySelector('.selectInitials option[value="emeif"]').innerHTML = "Comunitária";
        document.querySelector('.selectInitials option[value="emef"]').innerHTML = "Confessional";
        document.querySelector('.selectInitials option[value="emei"]').innerHTML = "OSC";
        document.querySelector('.selectInitials option[value="uei"]').innerHTML = "Privada";
        document.querySelector('.selectInitials option[value="osc"]').style.display = 'none';
    } else {
        document.querySelector('.areaPact').style.display = 'none';
    }
}

// Duplicar os campos de filiais

document.querySelector('.addBranch').addEventListener('click', duplicateBranch);

function duplicateBranch() {
    var elmnt = document.getElementsByTagName("form")[2];
    var cln = elmnt.cloneNode(true);
    elmnt.appendChild(cln);
}

function changeId() {
    let father = document.getElementsByTagName('form')[2];

    let idCount = 'i';
    for (let i = 0; i < father.children.length; i++) {
        father.children[i].id += idCount;
    }
}
