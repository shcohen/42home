/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   fillit.h                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/08/20 21:13:18 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/17 20:36:28 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#ifndef FILLIT_H

# define FILLIT_H
# include "../libft/libft.h"
# include <fcntl.h>
# define BUF_SIZE 547

typedef struct	s_struct
{
	char    *buf;
}				t_struct;

typedef struct s_var
{
	t_struct str;
}					t_var;

int		    main(int argc, char **argv);
void	    ft_error(int fd, t_var *var);
int		    ft_openfile(char *argv, t_var *var);
void  		ft_readfile(int fd, t_var *var);
void		ft_closefile(int fd, t_var *var);
int         ft_tetri1(t_var *var);

#endif
