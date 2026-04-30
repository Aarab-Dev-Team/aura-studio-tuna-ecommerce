@props(['type' => 'info', 'message' => '', 'icon' => null])

@php
    $icons = [
        'success' => 'iconoir-check-circle',
        'error'   => 'iconoir-warning-circle',
        'warning' => 'iconoir-warning-triangle',
        'info'    => 'iconoir-info-circle',
    ];
    $icon = $icon ?? $icons[$type] ?? 'iconoir-info-circle';
@endphp
<style>
:root{
        /* alert */
    --alert-success-bg:     #C8E6CC;
    --alert-success-text:   #1E5E2A;
    --alert-success-border: #6BBF78;

    --alert-error-bg:       #FAD0C4;
    --alert-error-text:     #8B2500;
    --alert-error-border:   #E8714A;

    --alert-warning-bg:     #FDECC8;
    --alert-warning-text:   #7A4D00;
    --alert-warning-border: #F0B840;

    --alert-info-bg:        #C8DFEE;
    --alert-info-text:      #1A4A6B;
    --alert-info-border:    #5FA8D8;
}

.alert-success {
    --alert-bg: var(--alert-success-bg);
    --alert-text: var(--alert-success-text);
    --alert-border: var(--alert-success-border);
}
.alert-error {
    --alert-bg: var(--alert-error-bg);
    --alert-text: var(--alert-error-text);
    --alert-border: var(--alert-error-border);
}
.alert-warning {
    --alert-bg: var(--alert-warning-bg);
    --alert-text: var(--alert-warning-text);
    --alert-border: var(--alert-warning-border);
}
.alert-info {
    --alert-bg: var(--alert-info-bg);
    --alert-text: var(--alert-info-text);
    --alert-border: var(--alert-info-border);
}


</style>

<div

     class="alert alert-{{ $type }}"
     style="display: flex; align-items: center; justify-content: space-between; 
            padding: 16px 20px ;
            background-color: var(--alert-bg, #f0f0f0); 
            color: var(--alert-text, #1a1a1a);
            margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    ">
    
    <div style="display: flex; align-items: center; gap: 12px;">
        <i class="{{ $icon }}" style="font-size: 20px; flex-shrink: 0;"></i>
        <div style="font-size: 14px; font-weight: 400;">
            @if($message)
                <div>{{ $message }}</div>
            @endif

            @if($errors->any())
                <ul style="margin: 5px 0 0 0; padding-left: 20px; list-style-type: disc;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    
    <button type="button" 
            @click="show = false" 
            onclick="this.closest('.alert').style.display='none'"
            style="background: none; border: none; cursor: pointer; font-size: 20px; line-height: 1; color: inherit; opacity: 0.5; transition: opacity 0.2s;"
            onmouseover="this.style.opacity=1"
            onmouseout="this.style.opacity=0.5">
        &times;
    </button>
</div>

<script>
    
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            if (alert.style.display !== 'none') {
                alert.style.transition = 'opacity 0.3s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }
        });
    }, 5000);
</script>