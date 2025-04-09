#include <stdio.h>

int main() {
    float idade;

    printf("Digite a idade: ");
    scanf("%f", &idade);

    if (idade < 18) {
        printf("Menor de idade\n");
    }

    else {
        printf("Maior de idade\n");
    }
}