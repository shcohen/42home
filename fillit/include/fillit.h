/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   fillit.h                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/08/20 21:13:18 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/13 18:03:13 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#ifndef FILLIT_H

# define FILLIT_H
# include "../libft/libft.h"
# include <fcntl.h>
# define BUF_SIZE 4002

int		main(int argc, char **argv);
void	ft_error(int fd);
int		ft_openfile(char *argv);
char	*ft_readfile(int fd);
int		ft_closefile(int fd);

#endif
