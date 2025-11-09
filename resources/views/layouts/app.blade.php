<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@include('layouts.nav')
<div>

  <div class="container alert-messages">
      @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="fas fa-check-circle me-2"></i>
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
      @endif

      <div class="content-wrapper">
          @yield('content')
      </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function deleteConfirm(url, rowId) {
    if(confirm("هل أنت متأكد من الحذف؟")) {
        // إضافة loading indicator
        const row = document.getElementById(rowId);
        const originalContent = row.innerHTML;
        row.style.opacity = '0.5';
        
        fetch(url, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json"
            },
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                // Animation قبل الحذف
                row.style.transition = 'all 0.3s ease';
                row.style.transform = 'translateX(100%)';
                row.style.opacity = '0';
                
               setTimeout(() => {
                    row.remove();
                    
                    // عرض رسالة نجاح
                    showSuccessMessage(data.message);
                }, 300);
            } else {
                row.style.opacity = '1';
                row.innerHTML = originalContent;
                alert('An error occurred while deleting the product. Please try again later.');
            }
        })
        .catch(err => {
            row.style.opacity = '1';
            row.innerHTML = originalContent;
                alert('An error occurred while deleting the product. Please try again later.');
            console.error(err);
        });
    }
}
function showSuccessMessage(message) {
    const container = document.querySelector('.alert-messages');
    if (!container) return;
    
    const alert = document.createElement('div');
    alert.className = 'alert alert-success alert-dismissible fade show';
    alert.style.width = '100%';
    alert.style.marginBottom = '1rem';
    alert.innerHTML = `
        <i class="fas fa-check-circle me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    // إضافة الـ alert في أول الـ container
    container.insertBefore(alert, container.firstChild);
    
    // إزالة الـ alert تلقائياً بعد 3 ثواني
    setTimeout(() => {
        alert.classList.remove('show');
        setTimeout(() => alert.remove(), 150);
    }, 3000);
}
</script>
@yield('scripts')
</body>
</html>