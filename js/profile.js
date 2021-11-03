// For rescheduling, submit the form to send a POST request to booking.php
function SubmitRescheduleForm(target) {
    // get id
    const apptId = target.id;
    // set id to input
    document.getElementById("AppointmentId").value = apptId;
    // submit
    document.getElementById("RescheduleForm").submit();
}