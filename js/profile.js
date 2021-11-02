// For rescheduling, submit the form to send a POST request to booking.php
function SubmitRescheduleForm(target) {
    const apptId = target.id;
    document.getElementById("AppointmentId").value = apptId;
    document.getElementById("RescheduleForm").submit();
}