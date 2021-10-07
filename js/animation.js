
// PROFILE.HTML
function editModal(type, session, inputType, variable) {
	document.getElementById('edit-modal').style.display='block';
	document.getElementById('editType').innerHTML = type;
	document.getElementById('editSession').value = session;
	document.getElementById('editSession').type = inputType;
	document.getElementById('editSessionRadio').value = variable;
}