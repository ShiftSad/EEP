#include <stdio.h>

int main() {
    struct estudante
    {
        char nome[50];
        float nota;
    };

    int running = 1;
    while (running) {
        int n;
        printf("Digite o número de estudantes: ");
        scanf("%d", &n);

        struct estudante estudantes[n];

        for (int i = 0; i < n; i++) {
            printf("Nome do estudante %d: ", i + 1);
            scanf("%s", estudantes[i].nome);
            printf("Nota do estudante %d: ", i + 1);
            scanf("%f", &estudantes[i].nota);
        }

        printf("\n\n");
        printf("Nome\tNota\n");
        for (int i = 0; i < n; i++) {
            printf("%s\t%.2f\n", estudantes[i].nome, estudantes[i].nota);
        }

        printf("\n\n");
        printf("Deseja continuar? (1 - Sim, 0 - Não): ");
        scanf("%d", &running);
    }
}