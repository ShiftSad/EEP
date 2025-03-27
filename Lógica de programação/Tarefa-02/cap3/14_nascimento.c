#include <stdio.h>

int main() {
    int birth_year, current_year;

    printf("Digite o ano de nascimento: ");
    scanf("%d", &birth_year);
    printf("Digite o ano atual: ");
    scanf("%d", &current_year);

    printf("Idade: %d anos\n", current_year - birth_year);
    printf("Idade: %d meses\n", (current_year - birth_year) * 12);
    printf("Idade: %d dias\n", (current_year - birth_year) * 365);
    printf("Idade: %d semanas\n", (current_year - birth_year) * 52);
}