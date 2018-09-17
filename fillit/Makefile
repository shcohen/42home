# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2018/09/13 15:59:26 by shcohen           #+#    #+#              #
#    Updated: 2018/09/17 19:38:40 by shcohen          ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

NAME = fillit

SRC = src/main.c \
	ft_error.c \
	ft_open_read_close.c \
	ft_tetri.c

OBJ = $(SRC:.c=.o) 

INC_PATH = include/

all: $(NAME)

$(NAME): $(OBJ)
	@(cd libft; make; cd ..)
	@gcc -Wall -Wextra -Werror $(OBJ) -L libft/ -lft -o $(NAME)

%.o: %.c
	gcc -Wall -Wextra -Werror -c $< -o $@

clean:
	@$(RM) $(OBJ)
	@(cd libft; make clean; cd ..)

fclean: clean
	@(cd libft; make fclean; cd ..)
	@$(RM) $(NAME)

re: fclean all

norme: 
	norminette $(SRC)
	norminette $(INC_PATH)*.h

.PHONY: all clean fclean re
