<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Professional;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario
        $user = User::create([
            'name' => 'User',
            'lastname' => 'user',
            'role' => 'user',
            'email' => 'user@email.com',
            'password' => Hash::make('12345678'),
        ]);

        Professional::create([
            'country' => 'Perú',
            'region' => 'Arequipa',
            'province' => 'Arequipa',
            'professional_years' => '18',
            'study_program' => 'Admin',
            'institution' => 'Admin',
            'age' => 40,
            'gender' => 'Masculino',
            'user_id' => $user->id,
        ]);

        $admin = User::create([
            'name' => 'admin',
            'lastname' => 'admin',
            'role' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
        ]);

        Professional::create([
            'country' => 'Perú',
            'region' => 'Arequipa',
            'province' => 'Arequipa',
            'professional_years' => '18',
            'study_program' => 'Admin',
            'institution' => 'Admin',
            'age' => 40,
            'gender' => 'Masculino',
            'user_id' => $admin->id,
        ]);

        // Datos de las dimensiones y preguntas
        $dimensions = [
            'Dominio del Contenido' => [
                'El docente demuestra un conocimiento sólido del contenido del curso',
                'Responde de manera adecuada a las preguntas relacionadas con la teoría del curso',
                'Explica los conceptos complejos de forma clara y comprensible',
                'Relaciona el contenido teórico con ejemplos actuales o relevantes',
                'Muestra interés y entusiasmo por el contenido que enseña',
                'Proporciona explicaciones detalladas sobre los temas fundamentales',
                'Utiliza recursos didácticos para facilitar la comprensión de los temas',
                'Cita fuentes actualizadas y confiables durante sus explicaciones',
                'Identifica los conceptos clave del curso de manera efectiva',
                'Propone actividades que refuercen la comprensión teórica',
            ],
            'Planeación y Organización' => [
                'El docente planifica adecuadamente las sesiones teóricas',
                'Presenta los objetivos de aprendizaje al inicio de cada clase',
                'El contenido del curso sigue una estructura lógica y coherente',
                'Asigna lecturas y materiales relacionados con los temas del curso',
                'Organiza su tiempo de clase para cubrir todos los temas planeados',
                'Proporciona materiales complementarios para reforzar el aprendizaje',
                'Aclara los objetivos de evaluación teórica desde el inicio del curso',
                'Ofrece retroalimentación útil sobre el desempeño teórico de los estudiantes',
                'Mantiene una comunicación constante sobre los avances del curso',
                'Establece expectativas claras para los estudiantes',
            ],
            'Evaluación y Retroalimentación' => [
                'Los exámenes y trabajos reflejan los contenidos abordados en clase',
                'Proporciona criterios claros para las evaluaciones teóricas',
                'Ofrece retroalimentación oportuna sobre las evaluaciones realizadas',
                'Diseña actividades evaluativas que miden el aprendizaje teórico',
                'Utiliza diversos métodos de evaluación para medir el desempeño académico',
                'Corrige las evaluaciones de manera justa y equitativa',
                'Da ejemplos específicos durante las sesiones de retroalimentación',
                'Se asegura de que los estudiantes comprendan los errores cometidos',
                'Promueve la autoevaluación entre los estudiantes',
                'Realiza evaluaciones continuas a lo largo del semestre',
            ],
            'Relación con los Estudiantes' => [
                'Escucha con atención las opiniones de los estudiantes',
                'Genera un ambiente inclusivo y respetuoso durante las clases teóricas',
                'Motiva a los estudiantes a participar en discusiones teóricas',
                'Está disponible para resolver dudas fuera del horario de clase',
                'Promueve el pensamiento crítico entre los estudiantes',
                'Fomenta un diálogo respetuoso entre los estudiantes',
                'Reconoce y valora las contribuciones de los estudiantes',
                'Ayuda a los estudiantes a conectar la teoría con sus intereses personales',
                'Se adapta a las necesidades individuales de los estudiantes',
                'Inspira confianza en sus habilidades como docente teórico',
            ],
        ];

        foreach ($dimensions as $dimensionName => $questions) {
            $questionType = QuestionType::create([
                'name' => $dimensionName,
            ]);

            foreach ($questions as $questionName) {
                Question::create([
                    'name' => $questionName,
                    'question_type_id' => $questionType->id,
                ]);
            }
        }
    }
}
