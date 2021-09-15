var fieldId = 1;
const addFieldButton = document.querySelector('#addField');
const creationForm = document.querySelector('#creationForm');
const creationButton = document.querySelector('#creationButton');

function addOptions(selectElement, optionsValue, optionTextContent) {
    for (let i = 0; i < optionsValue.length; i++) {
        let optionElement = document.createElement('option');
        if (optionsValue[i] === '') {
            optionElement.setAttribute('selected', optionsValue[i]);
        } else {
            optionElement.setAttribute('value', optionsValue[i]);
        }
        optionElement.textContent = optionTextContent[i];
        selectElement.appendChild(optionElement);
    }
    return selectElement;
}

function configAttributes(htmlElement, attrNames, attrValues, classNames) {
    for (let i = 0; i < attrNames.length; i++) {
        htmlElement.setAttribute(attrNames[i], attrValues[i]);
    }
    for (let j = 0; j < classNames.length; j++) {
        htmlElement.classList.add(classNames[j]);
    }
    return htmlElement;
}

function appendChildElements(htmlParentElement, childElements) {
    for (let i = 0; i < childElements.length; i++) {
        htmlParentElement.appendChild(childElements[i]);
    }
    return htmlParentElement;
}

function getField() {
    fieldId++;
    let optionsValue = ['', 'text', 'email', 'password', 'submit', 'number', 'tel'];
    let optionTextContent = ['Choose Field Type', 'Text', 'Email', 'Password', 'Button', 'Number', 'Tel'];
    let divParentBloc = document.createElement('div');
    let divSelectionBloc = document.createElement('div');
    let divInputBloc = document.createElement('div');
    let selectElement = document.createElement('select');
    let divDeleteBloc = document.createElement('div');
    let fieldName = document.createElement('input');
    let fieldLabel = document.createElement('input');
    let deleteButtonElement = document.createElement('button');

    divParentBloc.classList.add('input-group', 'mb-3', 'd-flex', 'flex-column');
    divSelectionBloc.classList.add('selectionBloc');
    divInputBloc.classList.add('inputBloc');
    divDeleteBloc.classList.add('deleteBloc', 'text-center');

    selectElement = configAttributes(
        selectElement, ['name'],
        [`form[field_${fieldId}][inputType]`],
        ['custom-select', 'm-2']
    );

    fieldName = configAttributes(
        fieldName,
        ['type', 'name', 'placeholder'],
        ['text', `form[field_${fieldId}][name]`, 'Give a name to your input field'],
        ['fieldName', 'form-control', 'm-2']
    );

    fieldLabel = configAttributes(
        fieldLabel,
        ['type', 'name', 'placeholder'],
        ['text', `form[field_${fieldId}][label]`, 'Give a label to your input field'],
        ['fieldLabel', 'form-control', 'm-2']
    );

    deleteButtonElement = configAttributes(
        deleteButtonElement,
        ['type'],
        ['button'],
        ['btn', 'btn-danger', 'deleteField']
    );

    deleteButtonElement.textContent = 'Delete Field';

    selectElement = addOptions(selectElement, optionsValue, optionTextContent);
    divSelectionBloc.appendChild(selectElement);
    divInputBloc = appendChildElements(divInputBloc, [fieldName, fieldLabel]);
    divDeleteBloc.appendChild(deleteButtonElement);
    divParentBloc = appendChildElements(divParentBloc, [divSelectionBloc, divInputBloc, divDeleteBloc]);

    let template = divParentBloc;

    return template;
}

//Insert new field
function insertField() {
    creationForm.insertBefore(getField(), creationButton);
}

//Delete a field
function addDeleteEvent() {
    let deleteFields = document.querySelectorAll('.deleteField');
    let lastAddedField = deleteFields[deleteFields.length - 1];
    lastAddedField.addEventListener('click', function (e) {
        e.target.parentNode.parentNode.remove();
    });
}

function addChangeEvent() {
    let selectElements = document.querySelectorAll('.selectionBloc select');
    let lastAddedSelect = selectElements[selectElements.length - 1];

    lastAddedSelect.addEventListener('change', function (e) {
        if (e.target.value === 'submit') {
            let attr = e.target.getAttribute('name');
            let fieldAttrValue = attr.slice(attr.indexOf('[') + 1, attr.indexOf(']'));

            //Create new field
            fieldValue = document.createElement('input');
            fieldValue = configAttributes(
                fieldValue,
                ['type', 'name', 'placeholder'],
                ['text', `form[${fieldAttrValue}][value]`, 'Give a value to your submit input'],
                ['fieldValue', 'form-control', 'm-2']
            )

            let childrenOfParentOfblocs = e.target.offsetParent.childNodes;

            childrenOfParentOfblocs.forEach(childBlocOfParentBloc => {
                if (childBlocOfParentBloc.classList.contains('inputBloc')) {
                    let inputBloc = childBlocOfParentBloc;
                    let childrenOfInputBloc = inputBloc.childNodes;
                    inputBloc.insertBefore(fieldValue, inputBloc.firstChild);

                    childrenOfInputBloc.forEach(inputElement => {
                        if (inputElement.classList.contains('fieldLabel')) {
                            inputElement.setAttribute('disabled', '');
                            inputElement.removeAttribute('type');
                        }
                    });
                }
            });
        } else {
            let childrenOfParentOfblocs = e.target.offsetParent.childNodes;
            childrenOfParentOfblocs.forEach(childBlocOfParentBloc => {
                if (childBlocOfParentBloc.classList.contains('inputBloc')) {
                    let inputBloc = childBlocOfParentBloc;
                    let childrenOfInputBloc = inputBloc.childNodes;
                    childrenOfInputBloc.forEach(inputElement => {
                        if (inputElement.classList.contains('fieldValue')) {
                            inputElement.remove();
                        }
                        if (inputElement.classList.contains('fieldLabel')) {
                            inputElement.removeAttribute('disabled');
                            inputElement.setAttribute('type', 'text');
                        }
                    });
                }
            });
        }
    });
}

function addFieldEvent() {
    addFieldButton.addEventListener('click', function () {
        insertField();
        addDeleteEvent();
        addChangeEvent();
    });
}

addFieldEvent();
insertField();
addDeleteEvent();
addChangeEvent();



