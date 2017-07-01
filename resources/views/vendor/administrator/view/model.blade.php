@inject('module', 'scaffold.module')

<?php
$elements = $module->viewColumns($item);
?>
<table class="table table-striped-col">
    <tr>
        <th colspan="{{ $elements->count() }}" class="btn-quirk">
            {{ (isset($title) ? $title: $module->singular()) }}
        </th>
    </tr>
    @foreach($elements as $element)
        @if ($element instanceof \Terranet\Administrator\Form\FormSection)
            <tr>
                <td colspan="2">{{ $element->title() }}</td>
            </tr>
        @else
            @if (! (is_array($value = $element->render($item)) || is_object($value)))
                <tr>
                    <td style="width: 20%; min-width: 200px;">{{ $element->title() }}</td>
                    <td>{!! $value !!}</td>
                </tr>
            @endif
        @endif
    @endforeach
</table>
