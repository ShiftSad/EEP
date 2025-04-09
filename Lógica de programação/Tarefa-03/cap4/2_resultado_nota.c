#include <stdio.h>

void main() {
    float notas[2], media = 0;

    printf("Digite as 2 notas do aluno:\n");
    for (int i = 0; i < 2; i++) {
        printf("Nota %d: ", i + 1);
        scanf("%f", &notas[i]);
        media += notas[i];
    }
    media /= 2;

    printf("A media do aluno e: %.2f\n", media);

    if (media > 7) {
        printf("Aprovado\n");
    } 
    
    else if (media >= 3) {
        printf("Exame\n");
    } 
    
    else {
        printf("Reprovado\n");
    }
}