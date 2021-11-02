function SubmitRescheduleForm(target) {
    const apptId = target.id;
    document.getElementById("AppointmentId").value = apptId;
    document.getElementById("RescheduleForm").submit();
}