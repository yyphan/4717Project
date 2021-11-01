function handleSelectDoctor(target) {
    // reset select
    let select = document.getElementById("TimeslotSelect");
    select.selectedIndex = -1;
    // disable all options
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