import os
import re
from collections import defaultdict

# Obrigado ChatGPT, eu não tava com vontade de fazer isso1
def main():
    script_dir = os.path.dirname(os.path.abspath(__file__))
    exercises_by_dir = defaultdict(list)
    os.chdir(script_dir)
    for root, dirs, files in os.walk('.'):
        relative_root = os.path.normpath(root)
        if relative_root == '.':
            continue
        
        path_parts = relative_root.split(os.sep)
        if not path_parts:
            continue 

        top_dir = path_parts[0] 
        
        for file in files:
            match = re.match(r'^(\d+)_(.+)\.c$', file)
            if file.endswith('.c') and match:
                try:
                    number = int(match.group(1))
                    name = match.group(2).replace('_', ' ') 
                    file_path = os.path.join(root, file)
                    with open(file_path, 'r', encoding='utf-8') as f:
                        code = f.read()
                    exercises_by_dir[top_dir].append((number, name, code, file_path))

                except ValueError:
                    print(f"Warning: Skipping file with non-integer prefix or format issue: {os.path.join(root, file)}")
                except Exception as e:
                    print(f"Error processing file {os.path.join(root, file)}: {e}")

    sorted_dirs = sorted(exercises_by_dir.keys())
    if not sorted_dirs:
        print("No valid C exercise files found in any subdirectory.")
        return
    
    for dir_name in sorted_dirs:
        exercises_by_dir[dir_name].sort(key=lambda x: x[0])

    output_filename = 'exercicios_combinados.md'
    with open(output_filename, 'w', encoding='utf-8') as f:
        main_title = " e ".join(sorted_dirs)
        f.write(f"# Tarefa: {main_title}\n\n")
        for dir_name in sorted_dirs:
            f.write(f"## Diretório: {dir_name}\n\n")
            exercises = exercises_by_dir[dir_name]
            if not exercises:
                f.write("Nenhum exercício encontrado neste diretório.\n\n")
                continue
            for num, name, code, file_path in exercises:
                f.write(f"### Exercício {num} - {name} ({file_path})\n\n")
                f.write(f"```c\n{code}\n```\n\n")
    
    print(f"Exercises combined successfully in '{output_filename}'")

if __name__ == "__main__":
    main()