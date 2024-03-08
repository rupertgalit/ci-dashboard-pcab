<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>heelo word</h1>
</body>
<script>

const url = 'http://ci-dashboard-pcab.test/generate-qr';
const token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiZXhwIjoxNzQwMTE3MzA3LCJpYXQiOjE3MDg1ODEzMDcsImp0aSI6IjI3ZGJhYzdkMDU2ZTQ4ZDdhYmU3ZDA4NzkyOTBhYzhjIiwidXNlcl9pZCI6MTl9.0WeX6Imapkv66QVAK6sThHf-pjjcJqxo1v8RQga5sRc'; // Replace 'your_bearer_token' with your actual token

const data = {
  app_uuid: '38c8db52-e8a9-48b2-a761-e1ff4b87ac26',
  reference_number: '0123433112331001',
  endpoint: 'p2m-generateQR',
  callback_uri: 'https://pcab-dev.netglobalsolutions.net/generate_qr/samplecallback',
  merchant_details: {
    method: 'dynamic',
    txn_type: 44,
    scanner_mobile_number: '09123456789',
    txn_amount: '40.00'
  },
  other_details: [
    { item: 'document_stamp_tax', amount: 10.00 },
    { item: 'fees_pcab', amount: 10.00 },
    { item: 'legal_research_fund', amount: 10.00 },
    { item: 'ngsi_convenience_fee', amount: 10.00 },
    { item: 'name_of_payor', amount: 'Big Construction Company' },
    { item: 'particulars', amount: 'PCAB Fee' }
  ]
};

fetch(url, {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'Authorization': `Bearer ${token}`
  },
  body: JSON.stringify(data),
})
  .then(response => response.json())
  .then(result => {
    console.log(result);
  })
  .catch(error => {
    console.error('Error:', error);
  });



</script>
</html>