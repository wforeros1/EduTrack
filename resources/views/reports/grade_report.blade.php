<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boletín de Calificaciones</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        h1, h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Boletín de Calificaciones</h1>
    <h2>Estudiante: {{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</h2>
    <h3>Curso: {{ $enrollment->course->course_name }}</h3>

    <table>
        <thead>
            <tr>
                <th>Descripción de la Calificación</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($enrollment->grades as $grade)
                <tr>
                    <td>{{ $grade->description }}</td>
                    <td>{{ number_format($grade->grade, 2) }} / 5.00</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No hay calificaciones registradas para este curso.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <p style="text-align: right; margin-top: 30px;">Fecha del Reporte: {{ date('Y-m-d') }}</p>
</body>
</html>