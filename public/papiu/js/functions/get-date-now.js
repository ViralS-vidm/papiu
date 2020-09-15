function getNowDate () {
  let today = new Date()
  let dd = today.getDate()
  let mm = today.getMonth() + 1
  let yyyy = today.getFullYear()
  if (dd < 10) {
    dd = '0' + dd
  }
  if (mm < 10) {
    mm = '0' + mm
  }
  return `${yyyy}-${mm}-${dd}`
}

function validateDate (timeStart, timeEnd) {
  let nowDate = getNowDate()
  if (timeStart && timeStart < nowDate) {
    toastr.warning('Cần chọn ngày trong tương lai')
    return false
  }

  if (timeEnd && timeEnd < nowDate) {
    toastr.warning('Cần chọn ngày trong tương lai')
    return false
  }

  if (timeStart && timeEnd && timeStart >= timeEnd) {
    toastr.warning('Ngày kết thúc phải sau ngày lưu trú')
    return false
  }
  return true
}

function validateDob (dob) {
  let nowDate = getNowDate()
  if (dob && dob > nowDate) {
    toastr.warning('Cần chọn ngày trong qúa khứ')
    return false
  }
  return true
}
