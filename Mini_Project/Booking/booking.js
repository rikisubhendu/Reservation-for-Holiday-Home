function addFamilyMembers() {
    var numMembers = document.getElementById('num_members').value;
    var familyContainer = document.getElementById('family_container');
    
    // Clear existing family member fields
    familyContainer.innerHTML = '';
    
    // Generate new family member fields
    for (var i = 0; i < numMembers; i++) {
        var nameLabel = document.createElement('label');
        nameLabel.textContent = 'Family Member ' + (i + 1) + ':';
        
        var firstNameInput = document.createElement('input');
        firstNameInput.type = 'text';
        firstNameInput.name = 'first_name[]'; // An array to store multiple first names
        firstNameInput.placeholder = 'First Name';
        //firstNameInput.required = true;

        var lastNameInput = document.createElement('input');
        lastNameInput.type = 'text';
        lastNameInput.name = 'last_name[]'; // An array to store multiple last names
        lastNameInput.placeholder = 'Last Name';
        //lastNameInput.required = true;

        var relationshipInput = document.createElement('input');
        relationshipInput.type = 'text';
        relationshipInput.name = 'relationship[]'; // An array to store multiple relationships
        relationshipInput.placeholder = 'Relationship';
        //relationshipInput.required = true;

        var dateOfBirthInput = document.createElement('input');
        dateOfBirthInput.type = 'date';
        dateOfBirthInput.name = 'date_of_birth[]'; // An array to store multiple dates of birth
        dateOfBirthInput.placeholder = 'Date of Birth';
        //dateOfBirthInput.required = true;

        familyContainer.appendChild(document.createElement('br'));
        familyContainer.appendChild(nameLabel);
        familyContainer.appendChild(document.createElement('br'));
        familyContainer.appendChild(firstNameInput);
        familyContainer.appendChild(lastNameInput);
        familyContainer.appendChild(relationshipInput);
        familyContainer.appendChild(dateOfBirthInput);
        familyContainer.appendChild(document.createElement('br'));
    }
}