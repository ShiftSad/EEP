#include <stdio.h>

int main() {
    int senha;
    printf("Digite a senha: ");
    scanf("%d", &senha);

    if (senha == 4531) {
        printf("Acesso permitido.\n");
    } else {
        printf("Acesso negado.\n");
    }
}