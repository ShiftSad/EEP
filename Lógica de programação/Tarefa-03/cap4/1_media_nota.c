#include <stdio.h>

void main() {
    float notas[4], media = 0;

    printf("Digite as 4 notas do aluno:\n");
    for (int i = 0; i < 4; i++) {
        printf("Nota %d: ", i + 1);
        scanf("%f", &notas[i]);
        media += notas[i];
    }
    media /= 4;

    printf("A media do aluno e: %.2f\n", media);

    if (media > 7) {
        printf("Aprovado\n");
    } 
    
    else {
        printf("Reprovado\n");
    }
}