// this is to show the correct timeslots when user selects a doctor
// e.g. only options with classname "option-for-id-1" is shown if user selects a doctor with id 1
function handleSelectDoctor(target) {
    // reset timeslot select
    let select = document.getElementById("TimeslotSelect");
    select.selectedIndex = -1;
    // disable all timeslot options
    let arrToDisable = document.getElementsByClassName("timeslot-option");
    for (let i = 0; i < arrToDisable.length; i++) {
        arrToDisable[i].disabled = true;
    }
    // enable the options for this doctor
    const doctorId = target.value;
    const optionsClassName = "option-for-id-" + doctorId;
    let arrToEnable = document.getElementsByClassName(optionsClassName);
    for (let i = 0; i < arrToEnable.length; i++) {
        arrToEnable[i].disabled = false;
    }
}