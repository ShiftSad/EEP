#include <stdio.h>
#define NUM_ALUNOS 10
#define NUM_AVALIACOES 4

void ler_dados_alunos(int numeros_alunos[], double notas[][NUM_AVALIACOES]) {
    for (int i = 0; i < NUM_ALUNOS; i++) {
        scanf("%d", &numeros_alunos[i]);
        for (int j = 0; j < NUM_AVALIACOES; j++) {
            scanf("%lf", &notas[i][j]);
        }
    }
}

double calcular_media_aluno(double notas_aluno[]) {
    double soma = 0.0;
    for (int i = 0; i < NUM_AVALIACOES; i++) {
        soma += notas_aluno[i];
    }
    return soma / NUM_AVALIACOES;
}

double calcular_media_geral_turma(double notas_alunos[][NUM_AVALIACOES]) {
    double soma_medias_alunos = 0.0;
    for (int i = 0; i < NUM_ALUNOS; i++) {
        soma_medias_alunos += calcular_media_aluno(notas_alunos[i]);
    }
    return soma_medias_alunos / NUM_ALUNOS;
}

void indicar_alunos_recuperacao(int numeros_alunos[], double notas_alunos[][NUM_AVALIACOES]) {
    printf("Alunos em recuperacao:\n");
    for (int i = 0; i < NUM_ALUNOS; i++) {
        if (calcular_media_aluno(notas_alunos[i]) < 6.0) {
            printf("%d\n", numeros_alunos[i]);
        }
    }
}

int main() {
    int numeros_alunos[NUM_ALUNOS];
    double notas[NUM_ALUNOS][NUM_AVALIACOES];
    ler_dados_alunos(numeros_alunos, notas);
    double media_turma = calcular_media_geral_turma(notas);
    printf("Media da turma: %.2f\n", media_turma);
    indicar_alunos_recuperacao(numeros_alunos, notas);
    return 0;
}
