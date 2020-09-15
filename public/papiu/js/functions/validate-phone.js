function validateNumber (mobile) {
  let vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g
  if (vnf_regex.test(mobile) == false) {
    toastr.warning('Định dạng số điện thoại chưa đúng.')
    return false
  }
  return true
}
